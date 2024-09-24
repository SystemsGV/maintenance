import { Group, Text } from "@mantine/core";
import ProjectGroupActions from "../ProjectGroupActions";
import classes from "../css/ProjectGroup.module.css";

export default function ArchivedProejctGroup({ group }) {
  return (
    <div className={classes.group}>
      <Group>
        <Text size="xl" fw={700}>
          {group.name}
        </Text>
        <ProjectGroupActions group={group} className={classes.actions} />
      </Group>
    </div>
  );
}
