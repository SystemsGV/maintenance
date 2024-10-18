import { Label } from '@/components/Label';
import { diffForHumans } from '@/utils/datetime';
import { redirectTo } from '@/utils/route';
import { isOverdue } from '@/utils/task';
import {
  Button,
  CheckIcon,
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
import { usePage } from '@inertiajs/react';

export default function Task({ task, onCheckChange }) {

  const { typeChecks } = usePage().props;
  const [check, setCheck] = useState(task.check || '');
  const [type, setType] = useState(task.type_check || '');


  const handleChange = (value) => {
    setCheck(value);
    onCheckChange(task.id, value, type);
  };

  const handleComboboxChange = (value) => {
    setType(value);
    onCheckChange(task.id, null, value);
  };

  const handleInputChange = (e) => {
    const value = e.target.value;
    setCheck(value);
  };

  const handleBlur = () => {
    onCheckChange(task.id, check, type);
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
            {type == 4 ? (
              <TextInput
                placeholder="Ingrese el resultado de la tarea"
                value={check}
                onChange={handleInputChange}
                onBlur={handleBlur}
              />
            ) : (
              <Chip.Group onChange={handleChange} value={check || null}>
                <Group justify='center'>
                  <Chip value={typeChecks[type-1]['option1']}>{typeChecks[type-1]['option1']}</Chip>
                  <Chip value={typeChecks[type-1]['option2']}>{typeChecks[type-1]['option2']}</Chip>
                  <Chip value={typeChecks[type-1]['option3']}>{typeChecks[type-1]['option3']}</Chip>
                </Group>
              </Chip.Group>
            )}
          </Grid.Col>

        {can('editar tarea') && (
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
                  {typeChecks.map( option => (
                    <Combobox.Option value={option.value} key={option.value} active={type}>
                      <Group gap="xs">
                        {option.value == type && <CheckIcon size={12} />}
                        <span>{option.label}</span>
                      </Group>
                    </Combobox.Option>
                  ))}
                </Combobox.Options>
              </Combobox.Dropdown>

            </Combobox>
          </Grid.Col>
        )}

      </Grid>
  );
}
