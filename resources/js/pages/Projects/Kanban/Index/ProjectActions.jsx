import { openConfirmModal } from "@/components/ConfirmModal";
import { ActionIcon, Group, Menu, rem } from "@mantine/core";
import { IconArchive, IconArchiveOff, IconDots } from "@tabler/icons-react";
import { useForm } from "laravel-precognition-react-inertia";

export default function ProjectActions({ project, ...props }) {
  const archiveForm = useForm(
    "delete",
    route("projects.kanban.destroy", [project.id]),
  );
  const restoreForm = useForm("post", route("projects.kanban.restore", [project.id]));

  const openArchiveModal = () =>
    openConfirmModal({
      type: "danger",
      title: "Archivar OT",
      content: `¿Estás seguro de que deseas archivar esta OT?`,
      confirmLabel: "Archivear",
      confirmProps: { color: "red" },
      onConfirm: () => archiveForm.submit({ preserveScroll: true }),
    });

  const openRestoreModal = () =>
    openConfirmModal({
      type: "info",
      title: "Restaurar OT",
      content: `¿Estás seguro de que deseas restaurar esta OT?`,
      confirmLabel: "Restaurar",
      confirmProps: { color: "blue" },
      onConfirm: () => restoreForm.submit({ preserveScroll: true }),
    });

  return (
    <Group gap={0} justify="flex-end" {...props}>
      {((can("archivar proyecto") && !route().params.archived) ||
        (can("restaurar proyecto") && route().params.archived)) && (
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
            {can("restaurar proyecto") && route().params.archived && (
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
            {can("archivar proyecto") && !route().params.archived && (
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
