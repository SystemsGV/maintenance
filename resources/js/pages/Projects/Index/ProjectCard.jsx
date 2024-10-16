import { stopOnIgnoreLink } from "@/utils/domEvents";
import { getInitials } from "@/utils/user";
import { Link } from "@inertiajs/react";
import { Avatar, Card, Group, Progress, Text, Tooltip } from "@mantine/core";
import ToggleFavorite from "./FavoriteToggle";
import ProjectCardActions from "./ProjectCardActions";
import classes from "./css/ProjectCard.module.css";

export default function ProjectCard({ item }) {
  const completedPercent = (item.completed_tasks_count / item.all_tasks_count) * 100;
  const overduePercent = (item.overdue_tasks_count / item.all_tasks_count) * 100;

  return (
    <Link
      href={item.default != 1 && can("ver proyecto") ? route("projects.tasks", item.id) : route("projects.kanban")}
      className={classes.link}
      onClick={stopOnIgnoreLink}
    >
      <Card withBorder padding="xl" radius="md" w={350} className={classes.card}>
        <Group justify="space-between">
          <Text fz={23} fw={700} className={item.default != 1 ? classes.title : ''}>
            {item.name}
          </Text>
          <ToggleFavorite item={item} />
        </Group>

        <Text fz="md" fw={800}>
          {item.default == 1 ? 'Defecto' : ''}
        </Text>

        {item.description?.length > 0 && (
          <Text fz="sm" c="dimmed" mt="lg">
            {item.description}
          </Text>
        )}

        <Text c="dimmed" fz="sm" mt="md">
          Tareas completadas:{" "}
          <Text span fw={500} c="bright">
            {item.completed_tasks_count} / {item.all_tasks_count}
          </Text>
        </Text>

        <Progress.Root value={item.all_tasks_count} mt={10} radius="xl">
          <Tooltip label={`Completado: ${item.completed_tasks_count}`} withArrow>
            <Progress.Section value={completedPercent} color="blue" />
          </Tooltip>
          <Tooltip label={`Vencido: ${item.overdue_tasks_count}`} withArrow>
            <Progress.Section value={overduePercent} color="red" />
          </Tooltip>
          <Progress.Section value={100 - (completedPercent + overduePercent)} color="gray" />
        </Progress.Root>

        <Group justify="space-between" mt="md">
          <Avatar.Group spacing="sm">
            {item.users_with_access.slice(0, 4).map((user) => (
              <Tooltip key={user.id} label={user.name} openDelay={300} withArrow>
                <Avatar
                  src={user.avatar}
                  radius="xl"
                  style={{ cursor: "default" }}
                  data-ignore-link
                  className={classes.avatar}
                >
                  {getInitials(user.name)}
                </Avatar>
              </Tooltip>
            ))}
            {item.users_with_access.length - 4 > 0 && (
              <Avatar radius="xl">+{item.users_with_access.length - 4}</Avatar>
            )}
          </Avatar.Group>

          <ProjectCardActions item={item} />
        </Group>
      </Card>
    </Link>
  );
}
