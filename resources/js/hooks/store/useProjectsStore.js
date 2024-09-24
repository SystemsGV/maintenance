import createProjectAttachmentsSlice from '@/hooks/store/projects/ProjectAttachmentsSlice';
import createProjectCommentsSlice from '@/hooks/store/projects/ProjectCommentsSlice';
import createProjectTimeLogsSlice from '@/hooks/store/projects/ProjectTimeLogsSlice';
import createProjectWebSocketUpdatesSlice from '@/hooks/store/projects/ProjectWebSocketUpdatesSlice';
import { move, reorder } from '@/utils/reorder';
import { router } from '@inertiajs/react';
import axios from 'axios';
import { produce } from "immer";
import { create } from 'zustand';

const useProjectsStore = create((set, get) => ({
  ...createProjectAttachmentsSlice(set, get),
  ...createProjectTimeLogsSlice(set, get),
  ...createProjectCommentsSlice(set, get),
  ...createProjectWebSocketUpdatesSlice(set, get),

  projects: {},
  selectedProjects: [],
  setProjects: (projects) => set(() => ({ projects: { ...projects } })),
  addProject: (project) => {
    return set(produce(state => {
      const index = state.projects[project.group_id].findIndex((i) => i.id === project.id);

      if (index === -1) {
        state.projects[project.group_id] = [...state.projects[project.group_id], project];
      }
    }));
  },
  findProject: (id) => {
    for (const groupId in get().projects) {
      const project = get().projects[groupId].find((i) => i.id === id);

      if (project) {
        return project;
      }
    }
    return null;
  },
  updateProjectProperty: async (project, property, value, options = null) => {
    try {
      if(property == 'tasks' && project.sent_archive == 1){
        return alert('Se debe subir imagen a la tarea');
      }

      await axios
      .put(
        route("projects.kanban.update", [project.id]),
        { [property]: value },
        { progress: false },
      )

      return set(produce(state => {
        const index = state.projects[project.group_id].findIndex((i) => i.id === project.id);

        if (property === 'group_id' && project.group_id !== value) {
          const result = move(state.projects, project.group_id, value, index, 0);

          state.projects[project.group_id] = result[project.group_id];
          state.projects[value] = result[value];

          state.projects[value][0][property] = value;
        } else {
          state.projects[project.group_id][index][property] = options || value;
        }
      }));
    } catch (e) {
      console.error(e);
      alert("Failed to save project property change");
    }
  },
  complete: (project, checked) => {
    return null;
    const newState = checked ? true : null;
    const index = get().projects[project.group_id].findIndex((i) => i.id === project.id);

    axios
      .post(route("projects.kanban.complete", [project.id]), { completed: checked })
      .catch(() => alert("Failed to save project completed action"));

    return set(produce(state => {
      state.projects[project.group_id][index].completed_at = newState
    }));
  },
  reorderProject: (source, destination) => {
    const sourceGroupId = +source.droppableId.split("-")[1];

    const result = reorder(get().projects[sourceGroupId], source.index, destination.index);

    const data = {
      ids: result.map((i) => i.id),
      group_id: sourceGroupId,
      from_index: source.index,
      to_index: destination.index,
    };

    axios
      .post(route("projects.kanban.reorder", [route().params.project]), data, { progress: false }) // Revisar el params.proyecto
      .catch(() => alert("Failed to save project reorder action"));

    return set(produce(state => { state.projects[sourceGroupId] = result }));
  },
  moveProject: (source, destination) => {
    const sourceGroupId = +source.droppableId.split("-")[1];
    const destinationGroupId = +destination.droppableId.split("-")[1];

    const result = move(get().projects, sourceGroupId, destinationGroupId, source.index, destination.index);

    const data = {
      ids: result[destinationGroupId].map((i) => i.id),
      from_group_id: sourceGroupId,
      to_group_id: destinationGroupId,
      from_index: source.index,
      to_index: destination.index,
    };

    const canMove = data.ids.every((element) => {
      const project = get().findProject(element);
      return !(project && (sourceGroupId + 1) !== destinationGroupId || project.default == 1);
    });

    if (!canMove) {
      return null; // Detener la acción si no se puede mover
    }

    axios
      .post(route("projects.kanban.move", [route().params.project]), data, { progress: false }) // revisar el params.proyect
      .catch(() => alert("Failed to save project move action"));

    return set(produce(state => {
      state.projects[sourceGroupId] = result[sourceGroupId];
      state.projects[destinationGroupId] = result[destinationGroupId];
    }));
  },

  toggleProjectSelection: (projectId) => {
    set(produce(state => {
      if (state.selectedProjects.includes(projectId)) {
        state.selectedProjects = state.selectedProjects.filter(id => id !== projectId);
      } else {
        state.selectedProjects.push(projectId);
      }
    }));
  },

  moveSelectedProjects: (projects) => {
    try {
      axios
      .post(route("projects.kanban.moveSelectedProjects"), { projects: projects }, { progress: true })
      .then(response => {
        get().clearSelectedProjects();
        return router.visit(route('projects.kanban'));
      })
      .catch(() => alert("Failed to save project reorder action"));


    } catch (e) {
      console.error(e);
      alert("Failed to save project property change");
    }
  },

  clearSelectedProjects: () => set({ selectedProjects: [] }),

}));

export default useProjectsStore;
