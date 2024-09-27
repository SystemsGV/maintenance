import { replaceUrlWithoutReload } from '@/utils/route';
import { produce } from 'immer';
import { create } from 'zustand';

const useProjectDrawerStore = create((set, get) => ({
  create: {
    opened: false,
    group_id: null,
  },
  edit: {
    opened: false,
    project: {},
  },
  openCreateProject: (groupId = null) => {
    return set(produce(state => {
      state.create.opened = true;
      state.create.group_id = groupId;
    }));
  },
  closeCreateProject: () => {
    return set(produce(state => {
      state.create.opened = false;
      state.create.group_id = null;
    }));
  },
  openEditProject: (project) => {
    replaceUrlWithoutReload(
      route("projects.kanban.open", [project.id])
    );
    return set(produce(state => {
      state.edit.opened = true;
      state.edit.project = project;
    }));
  },
  closeEditProject: () => {
    replaceUrlWithoutReload(route("projects.kanban"));

    return set(produce(state => {
      state.edit.opened = false;
    }));
  },
}));

export default useProjectDrawerStore;
