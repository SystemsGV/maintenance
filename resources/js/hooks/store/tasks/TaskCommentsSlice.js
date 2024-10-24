import axios from 'axios';
import { produce } from "immer";

const createTaskCommentsSlice = (set, get) => ({
  comments: [],

  fetchComments: async (task, onFinish) => {
    const commentsLocal = localStorage.getItem('comments') || false;
    try {
      if(commentsLocal){
        onFinish();
        return set(produce(state => {state.comments = JSON.parse(commentsLocal)}));
      }

      const { data } = await axios.get(route("projects.tasks.comments", [task.project_id, task.id]));
      onFinish();

      return set(produce(state => {state.comments = data}));
    } catch (e) {
      onFinish();
      console.error(e);
      alert("Failed to load comments");
    }
  },

  saveComment: async (task, comment, onFinish) => {
    const commentsLocal = localStorage.getItem('comments') || false;

    try {
      if(commentsLocal){
        const updatedCommentsLocal = [
          ...JSON.parse(commentsLocal),
          { taskId: task.id, content: comment }
        ];

        localStorage.setItem('comments', JSON.stringify(updatedCommentsLocal));
        onFinish();

        return set(produce(state => {state.comments = updatedCommentsLocal}));

      }

      const { data } = await axios.post(
        route("projects.tasks.comments.store", [task.project_id, task.id]),
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

export default createTaskCommentsSlice;
