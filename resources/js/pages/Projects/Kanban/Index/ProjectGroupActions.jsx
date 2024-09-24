import { openConfirmModal } from "@/components/ConfirmModal";
import { ActionIcon, Group, Menu, rem } from "@mantine/core";
import { IconArchive, IconArchiveOff, IconDots, IconPencil } from "@tabler/icons-react";
import { useForm } from "laravel-precognition-react-inertia";
import EditProjectsGroupModal from "./Modals/EditProjectsGroupModal";

export default function ProjectGroupActions({ group, ...props }) {
  const archiveForm = useForm(
    "delete",
    route("projects.kanban.groups.destroy", [group.id]),
  );
  const restoreForm = useForm(
    "post",
    route("projects.kanban.groups.restore", [group.id]),
  );

  const openArchiveModal = () =>
    openConfirmModal({
      type: "danger",
      title: "Archivar grup",
      content: `¿Está seguro de que desea archivar este grupo de OTs?`,
      confirmLabel: "Archivar",
      confirmProps: { color: "red" },
      onConfirm: () => archiveForm.submit({ preserveScroll: true }),
    });

  const openRestoreModal = () =>
    openConfirmModal({
      type: "info",
      title: "Restaurar grupo",
      content: `¿Está seguro de que desea restaurar este grupo de OTs?`,
      confirmLabel: "Restaurar",
      confirmProps: { color: "blue" },
      onConfirm: () => restoreForm.submit({ preserveScroll: true }),
    });

  const openEditModal = () => EditProjectsGroupModal(group);

  return (
    <Group gap={0} justify="flex-end" {...props}>
      {((can("archivar grupo de proyecto") && !route().params.archived) ||
        (can("restaurar grupo de proyecto") && route().params.archived) ||
        (can("editar grupo de proyecto") && !route().params.archived)) && (
        <Menu
          withArrow
          position="bottom-end"
          withinPortal
          shadow="md"
          transitionProps={{ duration: 100, transition: "pop-top-right" }}
          offset={{ mainAxis: 3, alignmentAxis: 5 }}
        >
          <Menu.Target>
            <ActionIcon variant="subtle" color="gray">
              <IconDots style={{ width: rem(20), height: rem(20) }} stroke={1.5} />
            </ActionIcon>
          </Menu.Target>
          <Menu.Dropdown>
            {can("editar grupo de proyecto") && !route().params.archived && (
              <Menu.Item
                leftSection={
                  <IconPencil style={{ width: rem(16), height: rem(16) }} stroke={1.5} />
                }
                onClick={openEditModal}
              >
                Edit
              </Menu.Item>
            )}
            {can("restaurar grupo de proyecto") && route().params.archived && (
              <Menu.Item
                leftSection={
                  <IconArchiveOff style={{ width: rem(16), height: rem(16) }} stroke={1.5} />
                }
                color="blue"
                onClick={openRestoreModal}
              >
                Restaurar
              </Menu.Item>
            )}
            {can("archivar grupo de proyecto") && !route().params.archived && (
              <Menu.Item
                leftSection={
                  <IconArchive style={{ width: rem(16), height: rem(16) }} stroke={1.5} />
                }
                color="red"
                onClick={openArchiveModal}
              >
                Archivar
              </Menu.Item>
            )}
          </Menu.Dropdown>
        </Menu>
      )}
    </Group>
  );
}
