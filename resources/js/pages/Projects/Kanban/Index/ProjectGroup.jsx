import { Draggable, Droppable } from "@hello-pangea/dnd";
import { ActionIcon, Checkbox, Group, Loader, LoadingOverlay, Text, Tooltip, rem } from "@mantine/core";
import { IconGripVertical, IconSend2 } from "@tabler/icons-react";
import Project from "./Project";
import ProjectGroupActions from "./ProjectGroupActions";
import classes from "./css/ProjectGroup.module.css";
import useProjectsStore from "@/hooks/store/useProjectsStore";
import { useState } from "react";

export default function ProjectGroup({ group, projects, ...props }) {

  const { selectedProjects, moveSelectedProjects } = useProjectsStore();
  const [loading, setLoading] = useState  (false);
  const disabledAction = () => {
    if (selectedProjects.length == 0){ return false};
    return selectedProjects.every(p => p.group_id == group.id); // Verifica si todos los IDs de grupo son iguales
  };

  return (
    <Draggable draggableId={group.id.toString()} {...props}>
      {(provided, snapshot) => (
        <div
          className={`${classes.row} ${snapshot.isDragging && classes.itemDragging}`}
          ref={provided.innerRef}
          {...provided.draggableProps}
        >

          <LoadingOverlay visible={loading} loaderProps={{ children: <Loader size={40} /> }} />

          <div className={classes.group}>
            <Group>
              <div {...provided.dragHandleProps} className={classes.dragHandle}>
                {/* <IconGripVertical
                  style={{
                    width: rem(18),
                    height: rem(18),
                    display:
                      can("reordenar grupo de proyecto") && !route().params.archived ? "inline" : "none",
                  }}
                  stroke={1.5}
                /> */}
              </div>
              <Text size="xl" fw={700}>
                {group.name}
              </Text>
              {/* <ProjectGroupActions group={group} className={classes.actions} /> */}
            </Group>
            {!route().params.archived && group.id != 4 && can("reordenar tarea") && (
              <Tooltip label="Mover tareas" openDelay={1000} withArrow>
                <ActionIcon
                  variant="filled"
                  size="md"
                  radius="xl"
                  onClick={() => moveSelectedProjects(selectedProjects, setLoading)}
                  disabled={!disabledAction()}
                >
                  <IconSend2 style={{ width: rem(18), height: rem(18) }} stroke={2} />
                </ActionIcon>
              </Tooltip>
            )}
          </div>
          <Droppable droppableId={`group-${group.id}-projects`} type="project">
            {(provided, snapshot) => (

              <div
                ref={provided.innerRef}
                {...provided.droppableProps}
                className={snapshot.isDraggingOver ? "isDraggingOver" : ""}
              >
                {projects.map((project, index) => (
                  <Project key={project.id} project={project} index={index} />
                ))}
                <div className={classes.placeholder}>{provided.placeholder}</div>
              </div>
            )}
          </Droppable>
        </div>
      )}
    </Draggable>
  );
}
