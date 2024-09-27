import { Label } from '@/components/Label';
import { diffForHumans } from '@/utils/datetime';
import { redirectTo } from '@/utils/route';
import { isOverdue } from '@/utils/task';
import {
  Chip,
  Flex,
  Grid,
  Group,
  Text,
  Tooltip,
  rem,
} from '@mantine/core';
import classes from './css/Task.module.css';
import { useEffect, useState } from 'react';
import TaskGroupLabel from '@/components/TaskGroupLabel';

export default function Task({ task, onCheckChange  }) {

  const [check, setCheck] = useState(task.check || '');
  const handleChange = (value) => {
    if (task.sent_archive == 1 && task.attachments.length == 0) {
      alert("No puedes cambiar el estado, primero deberás subir una imagen.");
      return; // No cambiar el estado
    }
    setCheck(value);
    onCheckChange(task.id, value);
  };

  useEffect(() => {
    setCheck(task.check || '');
  }, [task.check]);

  return (
      <Grid>
        <Grid.Col span={1}>
          {task.sent_archive !== 0 &&(
            <Tooltip label="Obligatorio archivos adjuntos" openDelay={1000} withArrow>
              <TaskGroupLabel size="sm">Archivo</TaskGroupLabel>
            </Tooltip>
          )}
        </Grid.Col>

        <Grid.Col span={5}>
          <Tooltip
            disabled={!isOverdue(task)}
            label={`${diffForHumans(task.due_on, true)} atrasado`}
            openDelay={1000}
            withArrow
          >
            <Text
              className={classes.name}
              size='sm'
              fw={500}
              truncate='end'
              c={isOverdue(task) && task.completed_at === null ? 'red' : ''}
              onClick={() => redirectTo('projects.tasks.open', [task.project_id, task.id, 1])}
            >
              #{task.number + ': ' + task.name}
            </Text>
          </Tooltip>
        </Grid.Col>

        <Grid.Col span={2}>
          <Group wrap='wrap' style={{ rowGap: rem(3), columnGap: rem(12) }}>
            {task.labels.map(label => (
              <Label
                key={label.id}
                name={label.name}
                color={label.color}
              />
            ))}
          </Group>
        </Grid.Col>

        <Grid.Col span={4}>
          <Chip.Group onChange={handleChange} value={check || false}>
            <Group justify='center'>
              <Chip value='bien'>Bien</Chip>
              <Chip value='mal'>Mal</Chip>
              <Chip value='n/a'>N/A</Chip>
            </Group>
          </Chip.Group>
        </Grid.Col>

      </Grid>
  );
}
