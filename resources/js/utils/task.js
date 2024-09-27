import dayjs from "dayjs";

export const isOverdue = (task) => {
  // if(dayjs().isAfter(task.due_on, 'day') && task.completed_at === null) {
  //   axios.post(route("projects.tasks.expired", [task.project_id, task.id]), {})
  //   .catch(() => alert("No se pudo actualizar a vencido"));
  // }

  return dayjs().isAfter(task.due_on, 'day');
};
