import axios from 'axios';
import { produce } from "immer";

const createProjectCommentsSlice = (set, get) => ({
  comments: [],
  fetchComments: async (project, onFinish) => {
    return null;
    try {
      const { data } = await axios.get(route("projects.tasks.comments", [task.id]));
      onFinish();

      return set(produce(state => {state.comments = data}));
    } catch (e) {
      onFinish();
      console.error(e);
      alert("Failed to load comments");
    }
  },
  saveComment: async (project, comment, onFinish) => {
    return null;
    try {
      const { data } = await axios.post(
        route("projects.tasks.comments.store", [task.id]),
        { content: comment },
        { progress: true }
      );
      onFinish();

      return set(produce(state => {
        state.comments = [
          data.comment,
          ...state.comments,
        ];
      }));
    } catch (e) {
      onFinish();
      console.error(e);
      alert("Failed to save comment");
    }
  },
});

export default createProjectCommentsSlice;
