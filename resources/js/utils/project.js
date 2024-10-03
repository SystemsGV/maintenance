import dayjs from "dayjs";

export const isOverdue = (project) => {
  const option = project.default != 1 && project.completed_at == null && dayjs().isAfter(project.due_on, 'day');
    // axios.post(route("projects.kanban.expired", [project.id]), {option})
    // .catch(() => alert("No se pudo actualizar a vencido"));
  return dayjs().isAfter(project.due_on, 'day');
};
