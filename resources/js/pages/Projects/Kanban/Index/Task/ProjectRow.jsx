import { Label } from "@/components/Label";
import useProjectDrawerStore from "@/hooks/store/useProjectDrawerStore";
import useProjectsStore from "@/hooks/store/useProjectsStore";
import { isOverdue } from "@/utils/project";
import { Draggable } from "@hello-pangea/dnd";
import { Checkbox, Flex, Group, Text, Tooltip, rem } from "@mantine/core";
import { IconGripVertical } from "@tabler/icons-react";
import ProjectActions from "../ProjectActions";
import classes from "./css/ProjectRow.module.css";

export default function ProjectRow({ project, index }) {
  const { complete, toggleProjectSelection, selectedProjects } = useProjectsStore();
  const { openEditProject } = useProjectDrawerStore();

  const handleCheckboxChange = () => {
    toggleProjectSelection(project.id);
  };

  return (
    <Draggable draggableId={"project-" + project.id} index={index}>
      {(provided, snapshot) => (
        <Flex
          {...provided.draggableProps}
          ref={provided.innerRef}
          className={`${classes.project} ${snapshot.isDragging && classes.itemDragging} ${
            project.completed_at !== null && classes.completed
          }`}
          wrap="nowrap"
        >
          <Group gap="sm" wrap="nowrap" w="100%">
            <div {...provided.dragHandleProps}>
              <IconGripVertical
                style={{
                  width: rem(18),
                  height: rem(18),
                  display: can("reordenar tarea") ? "inline" : "none",
                }}
                stroke={1.5}
                className={classes.dragHandle}
              />
            </div>

            <Checkbox
              checked={selectedProjects.includes(project.id)}
              key={project.id}
              display={project.completed_at != null ? 'none' : 'inline'}
              color="rgba(79, 79, 79, 79)"
              onChange={handleCheckboxChange}
            />
            <Text
              className={classes.name}
              size="sm"
              fw={500}
              truncate="end"
              c={isOverdue(project) && project.completed_at === null ? "red.7" : ""}
              onClick={() => { if(project.default != 1) openEditProject(project) }}
            >
              #{project.number + ": " + project.name}
            </Text>

            <Group wrap="nowrap" style={{ rowGap: rem(3), columnGap: rem(12) }}>
              {project.labels.map((label) => (
                <Label key={label.id} name={label.name} color={label.color} />
              ))}
            </Group>

            {(can("archivar proyecto") || can("restaurar proyecto")) && (
              <ProjectActions project={project} className={classes.actions} />
            )}
          </Group>
        </Flex>
      )}
    </Draggable>
  );
}
