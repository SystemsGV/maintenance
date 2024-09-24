import { move, reorder } from "@/utils/reorder";
import { produce } from "immer";

const createProjectWebSocketUpdatesSlice = (set, get) => ({
  addProjectLocally: (project) => {
    return set(produce(state => {
      state.projects[project.group_id] = [project, ...state.projects[project.group_id]];
    }));
  },
  updateProjectLocally: (projectId, property, value) => {
    return set(produce(state => {
      const project = get().findProject(projectId);
      const index = state.projects[project.group_id].findIndex((i) => i.id === project.id);

      if (property === 'group_id' && project.group_id !== value) {
        const result = move(state.projects, project.group_id, value, index, 0);

        state.projects[project.group_id] = result[project.group_id];
        state.projects[value] = result[value];

        state.projects[value][0][property] = value;
      } else {
        state.projects[project.group_id][index][property] = value;
      }
    }));
  },
  removeProjectLocally: (projectId) => {
    return set(produce(state => {
      const project = get().findProject(projectId);

      state.projects[project.group_id] = state.projects[project.group_id].filter(i => i.id !== project.id);
    }));
  },
  restoreProjectLocally: (groupId, newProject) => {
    return set(produce(state => {
      state.projects[groupId] = [newProject, ...state.projects[groupId]].sort((a, b) => (a.order_column > b.order_column ? 1 : -1));
    }));
  },
  // addCommentLocally: (comment) => {
  //   return set(produce(state => {
  //     state.comments = [comment, ...state.comments];
  //   }));
  // },
  // addAttachmentsLocally: (attachments) => {
  //   return set(produce(state => {
  //     const project = get().findProject(attachments[0].project_id);
  //     const index = state.projects[project.group_id].findIndex(i => i.id === project.id);

  //     state.projects[project.group_id][index].attachments = [...state.projects[project.group_id][index].attachments, ...attachments];
  //   }));
  // },
  // removeAttachmentLocally: (projectId, attachmentId) => {
  //   return set(produce(state => {
  //     const project = get().findProject(projectId);
  //     const index = state.projects[project.group_id].findIndex(i => i.id === projectId);

  //     state.projects[project.group_id][index].attachments = state.projects[project.group_id][index].attachments.filter(i => i.id !== attachmentId);
  //   }));
  // },
  addTimeLogLocally: (timeLog) => {
    return set(produce(state => {
      const project = get().findProject(timeLog.project_id);
      const index = state.projects[project.group_id].findIndex(i => i.id === project.id);

      state.projects[project.group_id][index].time_logs = [...state.projects[project.group_id][index].time_logs, timeLog];
    }));
  },
  removeTimeLogLocally: (projectId, timeLogId) => {
    return set(produce(state => {
      const project = get().findProject(projectId);
      const index = state.projects[project.group_id].findIndex(i => i.id === projectId);

      state.projects[project.group_id][index].time_logs = state.projects[project.group_id][index].time_logs.filter(i => i.id !== timeLogId);
    }));
  },
  reorderProjectLocally: (groupId, fromIndex, toIndex) => {
    const result = reorder(get().projects[groupId], fromIndex, toIndex);
    return set(produce(state => { state.projects[groupId] = result }));
  },
  moveProjectLocally: (fromGroupId, toGroupId, fromIndex, toIndex) => {
    const result = move(get().projects, fromGroupId, toGroupId, fromIndex, toIndex);


    return set(produce(state => {
      state.projects[fromGroupId] = result[fromGroupId];
      state.projects[toGroupId] = result[toGroupId];
      state.projects[toGroupId][toIndex] = {...state.projects[toGroupId][toIndex], group_id: toGroupId};
    }));
  },
});

export default createProjectWebSocketUpdatesSlice;
