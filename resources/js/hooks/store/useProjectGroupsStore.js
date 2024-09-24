import createProjectGroupWebSocketUpdatesSlice from '@/hooks/store/projectGroups/ProjectGroupWebSocketUpdatesSlice';
import { reorder } from '@/utils/reorder';
import axios from 'axios';
import { create } from 'zustand';

const useProjectGroupsStore = create((set, get) => ({
  ...createProjectGroupWebSocketUpdatesSlice(set, get),

  groups: [],
  setGroups: (groups) => set(() => ({ groups: [...groups] })),
  findProjectGroup: (id) => {
    return get().groups.find((i) => i.id === id);
  },
  reorderGroup: (fromIndex, toIndex) => {
    const result = reorder(get().groups, fromIndex, toIndex);

    axios
      .post(route("projects.kanban.groups.reorder", route().params.project), {ids: result.map((i) => i.id)}) // verificar el params.proyecto
      .catch(() => alert("Failed to save project group reorder action"));

    return set(() => ({ groups: [...result] }));
  },
}));

export default useProjectGroupsStore;
