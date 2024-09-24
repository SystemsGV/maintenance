import { convertToMinutes } from '@/utils/timer';
import axios from 'axios';
import { produce } from "immer";

const createProjectTimeLogsSlice = (set, get) => ({
  saveTimeLog: async (project, value) => {
    const index = get().projects[project.group_id].findIndex((i) => i.id === project.id);

    try {
      const { data } = await axios.post(
        route("projects.kanban.time-logs.store", [project.id]),
        { minutes: convertToMinutes(value) },
        { progress: true }
      );

      return set(produce(state => {
        state.projects[project.group_id][index].time_logs = [
          ...state.projects[project.group_id][index].time_logs,
          data.timeLog,
        ];
      }));
    } catch (e) {
      console.error(e);
      alert("Failed to save time log");
    }
  },
  deleteTimerLog: async (project, deleteId) => {
    const projectIndex = get().projects[project.group_id].findIndex((i) => i.id === project.id);

    try {
      await axios.delete(route("projects.kanban.time-logs.destroy", [project.id, deleteId]), { progress: true });

      return set(produce(state => {
        state.projects[project.group_id][projectIndex].time_logs = [
          ...state.projects[project.group_id][projectIndex].time_logs.filter(i => i.id !== deleteId)
        ];
      }));
    } catch (e) {
      console.error(e);
      alert("Failed to delete time log");
    }
  },
  startTimer: async (project) => {
    const index = get().projects[project.group_id].findIndex((i) => i.id === project.id);

    try {
      const { data } = await axios.post(route("projects.kanban.time-logs.timer.start", [project.id]), {}, {progress: true});

      return set(produce(state => {
        state.projects[project.group_id][index].time_logs = [
          ...state.projects[project.group_id][index].time_logs,
          data.timeLog,
        ];
      }));
    } catch (e) {
      console.error(e);
      alert("Failed to start timer");
    }
  },
  stopTimer: async (project, timeLogId) => {
    const projectIndex = get().projects[project.group_id].findIndex((i) => i.id === project.id);
    const index = get().projects[project.group_id][projectIndex].time_logs.findIndex((i) => i.id === timeLogId);

    try {
      const { data } = await axios.post(route("projects.kanban.time-logs.timer.stop", [project.id, timeLogId]), {}, {progress: true});

      return set(produce(state => {
        state.projects[project.group_id][projectIndex].time_logs[index] = {...data.timeLog};
      }));
    } catch (e) {
      console.error(e);
      alert("Failed to stop timer");
    }
  },
});

export default createProjectTimeLogsSlice;
