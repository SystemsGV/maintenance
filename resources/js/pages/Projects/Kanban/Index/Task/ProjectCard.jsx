import { Label } from "@/components/Label";
import useProjectDrawerStore from "@/hooks/store/useProjectDrawerStore";
import { isOverdue } from "@/utils/project";
import { getInitials } from "@/utils/user";
import { Draggable } from "@hello-pangea/dnd";
import { Link } from "@inertiajs/react";
import { Avatar, Checkbox, Group, Progress, Text, Tooltip, rem, useComputedColorScheme } from "@mantine/core";
import ProjectActions from "../ProjectActions";
import classes from "./css/ProjectCard.module.css";
import useProjectsStore from "@/hooks/store/useProjectsStore";

export default function   ProjectCard({ project, index }) {
  const { openEditProject } = useProjectDrawerStore();
  const computedColorScheme = useComputedColorScheme();
  const { toggleProjectSelection, selectedProjects } = useProjectsStore();

  const handleCheckboxChange = () => {
    toggleProjectSelection(project.id);
  };
  return (
    <Draggable draggableId={"project-" + project.id} index={index}>
      {(provided, snapshot) => (
        <div
          {...provided.draggableProps}
          ref={provided.innerRef}
          className={`${classes.project} ${snapshot.isDragging && classes.itemDragging} ${
            project.completed_at !== null && classes.completed
          }`}
        >
          <div {...(can("reordenar tarea") && provided.dragHandleProps)}>
          <Group wrap="nowrap">

            <Checkbox
              checked={selectedProjects.includes(project.id)}
              key={project.id}
              color="rgba(79, 79, 79, 79)"
              onChange={handleCheckboxChange}
            />

            <Text
              className={classes.name}
              size="xs"
              fw={500}
              c={isOverdue(project) && project.completed_at === null ? "red.7" : ""}
              onClick={() => { if(project.default != 1) openEditProject(project) }}
            >
              #{project.number + ": " + project.name}
            </Text>
          </Group>

            <Group wrap="nowrap" justify="space-between">
              <Group wrap="wrap" style={{ rowGap: rem(3), columnGap: rem(12) }} mt={5}>
                {project.labels.map((label) => (
                  <Label
                    key={label.id}
                    name={label.name}
                    color={label.color}
                    size={9}
                    dot={false}
                  />
                ))}
              </Group>

              {/* {project.users && (
                <Tooltip label={project.users.name} openDelay={1000} withArrow>
                  <Link
                    // href={route("users.edit", project.users.id)}
                    style={{ textDecoration: "none" }}
                  >
                    <Avatar
                      src={project.users.avatar}
                      radius="xl"
                      size={20}
                      color={computedColorScheme === "light" ? "white" : "blue"}
                    >
                      {getInitials(project.users.name)}
                    </Avatar>
                  </Link>
                </Tooltip>
              )} */}

              {(can("archivar proyecto") || can("restaurar proyecto")) && (
                <ProjectActions project={project} className={classes.actions} />
              )}
            </Group>

            <Group wrap="nowrap" justify="space-between">
              <Text c="dimmed" fz="sm" mt="md">
                Tareas completadas:{" "}
                <Text span fw={500} c="bright">
                  {project.completed_tasks_count} / {project.all_tasks_count}
                </Text>
              </Text>
            </Group>
          </div>
        </div>
      )}
    </Draggable>
  );
}
