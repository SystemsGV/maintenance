import { Label } from '@/components/Label';
import { diffForHumans } from '@/utils/datetime';
import { redirectTo } from '@/utils/route';
import { isOverdue } from '@/utils/task';
import {
  Button,
  Chip,
  Combobox,
  Flex,
  Grid,
  Group,
  Text,
  TextInput,
  Tooltip,
  rem,
  useCombobox,
} from '@mantine/core';
import classes from './css/Task.module.css';
import { useEffect, useState } from 'react';
import TaskGroupLabel from '@/components/TaskGroupLabel';
import EditTaskModal from '../Index/Modals/EditTaskModal';

export default function Task({ task, onCheckChange  }) {

  const [check, setCheck] = useState(task.check || '');
  const [viewType, setViewType] = useState('check 1');
  const handleChange = (value) => {
    setCheck(value);
    onCheckChange(task.id, value);
  };
  const handleComboboxChange = (value) => {
    setViewType(value);
  };
  const handleInputChange = (e) => {
    const value = e.target.value;
    setCheck(value);
    onCheckChange(task.id, value); // Actualiza el valor en la tabla de tareas
  };

  const combobox = useCombobox({
    onDropdownClose: () => combobox.resetSelectedOption(),
  });

  useEffect(() => {
    setCheck(task.check || '');
  }, [task.check]);

  return (
      <Grid>
        <Grid.Col span={1}>
          {task.sent_archive != 0 &&(
            <Tooltip label="Obligatorio archivos adjuntos" openDelay={1000} withArrow>
              {task.attachments.length == 0 ?
                <TaskGroupLabel size="sm">Archivo</TaskGroupLabel>
                :
                <TaskGroupLabel size="sm" bg="teal">Subido</TaskGroupLabel>}
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
              onClick={() => EditTaskModal(task)}
            >
              #{task.number + ': ' + task.name}
            </Text>
          </Tooltip>
        </Grid.Col>

        <Grid.Col span={1}>
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
            {viewType == 'check 1' && (
              <Chip.Group onChange={handleChange} value={check || false}>
                <Group justify='center'>
                  <Chip value='bien'>Bien</Chip>
                  <Chip value='mal'>Mal</Chip>
                  <Chip value='n/a'>N/A</Chip>
                </Group>
              </Chip.Group>
            )}
            {viewType == 'check 2' && (
              <Chip.Group onChange={handleChange} value={check || false}>
                <Group justify='center'>
                  <Chip value='aprobo'>Aprobo</Chip>
                  <Chip value='alerta'>Alerta</Chip>
                  <Chip value='fallo'>Fallo</Chip>
                </Group>
              </Chip.Group>
            )}
            {viewType == 'check 3' && (
              <Chip.Group onChange={handleChange} value={check || false}>
                <Group justify='center'>
                  <Chip value='si'>Si</Chip>
                  <Chip value='no'>No</Chip>
                  <Chip value='n/a'>N/A</Chip>
                </Group>
              </Chip.Group>
            )}
            {viewType == 'check 4' && (
              <TextInput
                placeholder="Ingrese el resultado de la tarea"
                value={check}
                onChange={handleInputChange}
              />
            )}
          </Grid.Col>

        <Grid.Col span={1}>
          <Combobox
          store={combobox}
          width={250}
          position="bottom-start"
          withArrow
          onOptionSubmit={handleComboboxChange}
          >
            <Combobox.Target>
              <Button variant="light" radius="xl" color='violet' onClick={() => combobox.toggleDropdown()}>Tipo</Button>
            </Combobox.Target>

            <Combobox.Dropdown>
              <Combobox.Options>
                <Combobox.Option value="check 1" key="check 1">Bien/Mal/Na</Combobox.Option>
                <Combobox.Option value="check 2" key="check 2">Aprobo/Alerta/Fallo</Combobox.Option>
                <Combobox.Option value="check 3" key="check 3">Si/No/Na</Combobox.Option>
                <Combobox.Option value="check 4" key="check 4">Texto</Combobox.Option>
              </Combobox.Options>
            </Combobox.Dropdown>

          </Combobox>
        </Grid.Col>

      </Grid>
  );
}
