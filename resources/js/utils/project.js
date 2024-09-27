import dayjs from "dayjs";

export const isOverdue = (project) => {
  // if(dayjs().isAfter(project.due_on, 'day') && project.completed_at === null) {
  //   axios.post(route("projects.kanban.expired", [project.id]), {})
  //   .catch(() => alert("No se pudo actualizar a vencido"));
  // }
  return dayjs().isAfter(project.due_on, 'day');
};
