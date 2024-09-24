import { produce } from "immer";

const createProjectWebSocketUpdatesSlice = (set, get) => ({
  addProjectGroupLocally: (projectGroup) => {
    return null;
    return set(produce(state => {
      state.groups = [...state.groups, taskGroup];
    }));
  },
  updateProjectGroupLocally: (projectGroup) => {
    return null;
    return set(produce(state => {
      const index = get().groups.findIndex(i => i.id === taskGroup.id);
      state.groups[index] = taskGroup;
    }));
  },
  removeProjectGroupLocally: (projectGroupId) => {
    return null;
    return set(produce(state => {
      state.groups = state.groups.filter(i => i.id !== taskGroupId);
    }));
  },
  restoreProjectGroupLocally: (projectGroup) => {
    return null;
    return set(produce(state => {
      state.groups = [
        taskGroup,
        ...state.groups.filter(i => i.id !== taskGroup.id)
      ].sort((a, b) => (a.order_column > b.order_column ? 1 : -1));
    }));
  },
  reorderProjectGroupLocally: (ids) => {
    return null;
    return set(produce(state => {
      state.groups = state.groups.sort((a, b) => ids.indexOf(a.id) - ids.indexOf(b.id));
    }));
  },
});

export default createProjectWebSocketUpdatesSlice;
