import { usePage } from "@inertiajs/react";
import { showNotification } from "@mantine/notifications";
import useNotificationsStore from "./store/useNotificationsStore";
import useTaskGroupsStore from "./store/useTaskGroupsStore";
import useTasksStore from "./store/useTasksStore";
import useProjectsStore from "./store/useProjectsStore";
import useProjectGroupsStore from "./store/useProjectGroupsStore";

export default function useWebSockets() {
  const { auth: { user } } = usePage().props;
  const { addNotification } = useNotificationsStore();
  const {
    addTaskLocally, updateTaskLocally, removeTaskLocally, restoreTaskLocally, addCommentLocally, addAttachmentsLocally,
    removeAttachmentLocally, addTimeLogLocally, removeTimeLogLocally, reorderTaskLocally, moveTaskLocally,
  } = useTasksStore();
  const {
    addTaskGroupLocally, updateTaskGroupLocally, removeTaskGroupLocally, restoreTaskGroupLocally, reorderTaskGroupLocally,
  } = useTaskGroupsStore();
  const {
    addProjectLocally, updateProjectLocally, removeProjectLocally, restoreProjectLocally, addProjectTimeLogLocally,
    removeProjectTimeLogLocally, reorderProjectLocally, moveProjectLocally,
  } = useProjectsStore();
  const {
    addProjectGroupLocally, updateProjectGroupLocally, removeProjectGroupLocally, restoreProjectGroupLocally, reorderProjectGroupLocally,
  } = useProjectGroupsStore();

  const initUserWebSocket = () => {
    window.Echo.private(`App.Models.User.${user.id}`).notification((notification) => {
      addNotification(notification);

      showNotification({
        title: notification.title,
        message: notification.subtitle,
        autoClose: 8000,
      });
    });
  };

  const initProjectWebSocket = (project = null) => {

      window.Echo.private(`App.Models.Project`)
      .listen('Project\\ProjectCreated', (e) => addProjectLocally(e.project))
      .listen('Project\\ProjectUpdated', (e) => updateProjectLocally(e.projectId, e.property, e.value))
      .listen('Project\\ProjectDeleted', (e) => removeProjectLocally(e.projectId))
      .listen('Project\\ProjectRestored', (e) => restoreProjectLocally(e.groupId, e.project))
      .listen('Project\\ProjectTimeLogCreated', (e) => addProjectTimeLogLocally(e.timeLog))
      .listen('Project\\ProjectTimeLogDeleted', (e) => removeProjectTimeLogLocally(e.projectId, e.timeLogId))
      .listen('Project\\ProjectOrderChanged', (e) => reorderProjectLocally(e.groupId, e.fromIndex, e.toIndex))
      .listen('Project\\ProjectGroupChanged', (e) => moveProjectLocally(e.fromGroupId, e.toGroupId, e.fromIndex, e.toIndex))
      .listen('ProjectGroup\\ProjectGroupCreated', (e) => addProjectGroupLocally(e.projectGroup))
      .listen('ProjectGroup\\ProjectGroupUpdated', (e) => updateProjectGroupLocally(e.projectGroup))
      .listen('ProjectGroup\\ProjectGroupDeleted', (e) => removeProjectGroupLocally(e.projectGroupId))
      .listen('ProjectGroup\\PrjectGroupRestored', (e) => restoreProjectGroupLocally(e.projectGroup))
      .listen('ProjectGroup\\ProjectGroupOrderChanged', (e) => reorderProjectGroupLocally(e.projectGroupIds))

    window.Echo.private(`App.Models.Project.${project ? project.id : ''}`)
      .listen('Task\\TaskCreated', (e) => addTaskLocally(e.task))
      .listen('Task\\TaskUpdated', (e) => updateTaskLocally(e.taskId, e.property, e.value))
      .listen('Task\\TaskDeleted', (e) => removeTaskLocally(e.taskId))
      .listen('Task\\TaskRestored', (e) => restoreTaskLocally(e.groupId, e.task))
      .listen('Task\\CommentCreated', (e) => addCommentLocally(e.comment))
      .listen('Task\\AttachmentsUploaded', (e) => addAttachmentsLocally(e.attachments))
      .listen('Task\\AttachmentDeleted', (e) => removeAttachmentLocally(e.taskId, e.attachmentId))
      .listen('Task\\TimeLogCreated', (e) => addTimeLogLocally(e.timeLog))
      .listen('Task\\TimeLogDeleted', (e) => removeTimeLogLocally(e.taskId, e.timeLogId))
      .listen('Task\\TaskOrderChanged', (e) => reorderTaskLocally(e.groupId, e.fromIndex, e.toIndex))
      .listen('Task\\TaskGroupChanged', (e) => moveTaskLocally(e.fromGroupId, e.toGroupId, e.fromIndex, e.toIndex))
      .listen('TaskGroup\\TaskGroupCreated', (e) => addTaskGroupLocally(e.taskGroup))
      .listen('TaskGroup\\TaskGroupUpdated', (e) => updateTaskGroupLocally(e.taskGroup))
      .listen('TaskGroup\\TaskGroupDeleted', (e) => removeTaskGroupLocally(e.taskGroupId))
      .listen('TaskGroup\\TaskGroupRestored', (e) => restoreTaskGroupLocally(e.taskGroup))
      .listen('TaskGroup\\TaskGroupOrderChanged', (e) => reorderTaskGroupLocally(e.taskGroupIds))

    return () => window.Echo.leave(`App.Models.Project.${project ? project.id : ''}`);
  };

  const initTaskWebSocket = (task) => {
    window.Echo.private(`App.Models.Task.${task.id}`)
      .listen('Task\\CommentCreated', (e) => addCommentLocally(e.comment));

    return () => window.Echo.leave(`App.Models.Task.${task.id}`);
  };

  return { initUserWebSocket, initProjectWebSocket, initTaskWebSocket };
}
