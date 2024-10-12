import useProjectDrawerStore from "@/hooks/store/useProjectDrawerStore";
import useProjectsStore from "@/hooks/store/useProjectsStore";
import useWebSockets from "@/hooks/useWebSockets";
import { usePage } from "@inertiajs/react";
import {
  Breadcrumbs,
  Center,
  Drawer,
  Group,
  Loader,
  LoadingOverlay,
  MultiSelect,
  NumberInput,
  Select,
  Tabs,
  Text,
  TextInput,
  Textarea,
  rem,
} from "@mantine/core";
import { DateInput, DateTimePicker } from "@mantine/dates";
import dayjs from "dayjs";
import { useEffect, useRef, useState } from "react";
import LabelsDropdown from "./LabelsDropdown";
import Timer from "./Timer";
import Task from "./Task";
import classes from "./css/ProjectDrawer.module.css";
import EmptyWithIcon from "@/components/EmptyWithIcon";
import { IconSearch } from "@tabler/icons-react";
import useTasksStore from "@/hooks/store/useTasksStore";

export function EditProjectDrawer() {
  const { edit, openEditProject, closeEditProject } = useProjectDrawerStore();
  const { initProjectWebSocket, initTaskWebSocket } = useWebSockets();
  const { findProject, updateProjectProperty } = useProjectsStore();
  const { tasks, setTasks } = useTasksStore();
  const {users_access, games, labels, types, openedProject } = usePage().props;
  const [loading, setLoading] = useState(false);

  const project = findProject(edit.project.id);

  const [data, setData] = useState({
    client_company_id: "",
    group_id: "",
    game_id: "",
    period_id: "",
    type_id: "",
    name: "",
    description: "",
    rate: 0,
    estimation: 0,
    due_on: "",
    start_date: "",
    fault_date: "",
    default: false,
    users: [],
    labels: [],
    tasks: [],
  });

  const handleCheckChange = async (taskId, value) => {
    setLoading(true);
    const response = await axios.post(route("projects.kanban.check-list", [project.id, taskId]), { check: value })
                      .catch(() => alert("No se pudo guardar la acción checked de la tarea"));

    if (response.data.message) {
      alert("No puedes cambiar el estado, primero deberás subir una imagen.");
    }

    await updateProjectProperty(project, 'tasks', response.data.project.tasks);
    await updateProjectProperty(project, 'completed_tasks_count', response.data.project.completed_tasks_count);
    return setLoading(false);
  };

  useEffect(() => {
    if (openedProject) setTimeout(() => openEditProject(openedProject), 50);
  }, []);

  useEffect(() => {
    if (edit.opened) {
      axios.post(route("projects.tasks.grouped", project) , { progress: false })
      .then(response => {
        setTasks(response.data);
      })
      .catch(() => alert("Fallo al consultar tareas"));
      return initProjectWebSocket(project);
    }
  }, [edit.opened]);

  useEffect(() => {
    if (edit.opened) {
      setData({
        client_company_id: project?.client_company_id || 1,
        group_id: project?.group_id || "",
        game_id: project?.game_id || "",
        period_id: project?.period_id || "",
        type_id: project?.type_id || "",
        name: project?.name || "",
        description: project?.description || "",
        rate: project?.rate || "",
        estimation: project?.estimation || 0,
        due_on: project?.due_on ? dayjs(project?.due_on).toDate() : "",
        start_date: project?.start_date ? dayjs(project?.start_date).toDate() : null,
        fault_date: project?.fault_date ? dayjs(project?.fault_date).toDate() : null,
        default: project?.default !== undefined ? project.default : false,
        users: (project?.users || []).map((i) => i.id.toString()),
        labels: (project?.labels || []).map((i) => i.id),
        tasks: (project?.tasks || []),
      });
    }

  }, [edit.opened, project]);

  const updateValue = (field, value) => {
    setData({ ...data, [field]: value });

    const dropdowns = ["labels", "users"];
    const onBlurInputs = ["name", "description"];

    if (dropdowns.includes(field)) {
      const options = {
        labels: value.map((id) => labels.find((i) => i.id === id)),
        users: value.map((id) =>
          users_access.find((i) => i.id.toString() === id),
        ),
      };

      updateProjectProperty(project, field, value, options[field]);
    } else if (!onBlurInputs.includes(field)) {
      updateProjectProperty(project, field, value);
    }
  };

  const onBlurUpdate = (property) => {
    if (data.name.length > 0) {
      updateProjectProperty(project, property, data[property]);
    }
  };

  return (

    <Drawer
      opened={edit.opened}
      onClose={closeEditProject}
      title={
        <Group ml={25} my="sm" wrap="nowrap">
          {/* <Checkbox
            size="md"
            radius="xl"
            color="green"
            checked={project?.completed_at !== null}
            onChange={(e) => complete(project, e.currentTarget.checked)}
            className={can("completar proyecto") ? classes.checkbox : classes.disabledCheckbox}
          /> */}
          <Text
            fz={rem(27)}
            fw={600}
            lh={1.2}
            td={project?.completed_at !== null ? "line-through" : null}
          >
            #{project?.number}: {data.name}
          </Text>
        </Group>
      }
      position="right"
      size={1300}
      overlayProps={{ backgroundOpacity: 0.55, blur: 3 }}
      transitionProps={{
        transition: "slide-left",
        duration: 400,
        timingFunction: "ease",
      }}
    >

      <LoadingOverlay visible={loading} loaderProps={{ children: <Loader size={40} /> }} />

      <Tabs defaultValue="info">
        <Tabs.List grow>
          <Tabs.Tab value="info">Información</Tabs.Tab>
          <Tabs.Tab value="tasks" disabled={project?.completed_at != null ? true : false}>Tareas</Tabs.Tab>
        </Tabs.List>

        <form>
          <Tabs.Panel value="info">
            {project ? (
              <>
                <Breadcrumbs
                  c="dark.3"
                  ml={24}
                  mb="xs"
                  separator="I"
                  separatorMargin="sm"
                  styles={{ separator: { opacity: 0.3 } }}
                >
                </Breadcrumbs>
                <div className={classes.inner}>
                  <div className={classes.content}>
                    <TextInput
                      label="Nombre"
                      placeholder="Nombre de la orden de trabajo"
                      value={data.name}
                      onChange={(e) => updateValue("name", e.target.value)}
                      onBlur={() => onBlurUpdate("name")}
                      error={data.name.length === 0}
                      disabled={!can("editar proyecto")}
                    />

                    <Textarea
                      label='Descripción'
                      placeholder='Descripción de la orden de trabajo'
                      mt='md'
                      autosize
                      minRows={15}
                      maxRows={20}
                      onBlur={() => onBlurUpdate("description")}
                      value={data.description}
                      onChange={e => updateValue('description', e.target.value)}
                      disabled={!can("editar proyecto")}
                    />

                    <MultiSelect
                      label="Conceder acceso a las usuarias"
                      placeholder={!data.users.length ? "Seleccionar usuarios" : null}
                      searchable
                      mt="md"
                      value={data.users}
                      onChange={(values) => updateValue("users", values)}
                      data={users_access.map((i) => ({
                        value: i.id.toString(),
                        label: i.name,
                      }))}
                      readOnly={!can("editar proyecto")}
                    />

                  </div>
                  <div className={classes.sidebar}>
                    <Select
                      label="Atracción que requiere mantenimiento"
                      placeholder="Seleccionar atracción"
                      allowDeselect={false}
                      value={data.game_id.toString()}
                      onChange={(values) => updateValue("game_id", values)}
                      data={games}
                      readOnly={!can("editar proyecto") || edit.opened}
                    />

                      <Select
                        label="Tipo de mantenimiento"
                        placeholder="Seleccionar tipo de mantenimiento"
                        searchable
                        mt="md"
                        value={data.type_id ? data.type_id.toString() : null}
                        onChange={(value) => updateValue("type_id", value)}
                        data={types}
                        readOnly={!can("editar proyecto")}
                      />

                    <DateInput
                      clearable
                      valueFormat="DD MMM YYYY"
                      minDate={new Date()}
                      mt="md"
                      label="Fecha de vencimiento"
                      placeholder="Elija la fecha de vencimiento de la OT"
                      value={data.due_on ? new Date(data.due_on) : null}
                      onChange={value => {
                        const formattedDate = value ? dayjs.tz(value, 'America/Lima').format() : null;
                        updateValue('due_on', formattedDate);
                      }}
                      readOnly={!can("editar proyecto")}
                    />

                    {(project.start_date || project.fault_date) && (
                      <>
                        <DateTimePicker
                          clearable
                          valueFormat="DD MMM YYYY hh:mm A"
                          label="Hora de falla"
                          placeholder="Elija la fecha y hora de la falla"
                          mt='md'
                          value={data.fault_date ? new Date(data.fault_date) : null}
                          onChange={value => {
                            const formattedDate = value ? dayjs.tz(value, 'America/Lima').format() : null;
                            updateValue('fault_date', formattedDate);
                          }}
                          readOnly={!can("editar proyecto")}
                        />
                        <DateTimePicker
                          clearable
                          valueFormat="DD MMM YYYY hh:mm A"
                          label="Hora de inicio"
                          placeholder="Elija la fecha y hora de inicio"
                          mt='md'
                          value={data.start_date ? new Date(data.start_date) : null}
                          onChange={value => {
                            const formattedDate = value ? dayjs.tz(value, 'America/Lima').format() : null;
                            updateValue('start_date', formattedDate);
                          }}
                          readOnly={!can("editar proyecto")}
                        />
                      </>
                    )}

                    <LabelsDropdown
                      items={labels}
                      selected={data.labels}
                      onChange={(values) => updateValue("labels", values)}
                      mt="md"
                    />

                    <NumberInput
                      label="Estimación de tiempo"
                      mt="md"
                      decimalScale={2}
                      fixedDecimalScale
                      value={data.estimation}
                      min={0}
                      allowNegative={false}
                      step={0.1}
                      suffix=" hours"
                      onChange={(value) => updateValue("estimation", value)}
                      readOnly={!can("editar proyecto")}
                    />

                    {(can("ver registros de tiempo") || can("agregar registro de tiempo")) && project.completed_at == null
                      && <Timer mt="xl" project={project} />}
                  </div>
                </div>
              </>
            ) : (
              <></>
            )}
          </Tabs.Panel>
          <Tabs.Panel value="tasks">
            {edit.opened && project.tasks.length && can('ver tareas') ? (
              <>
                <Breadcrumbs
                  c="dark.3"
                  ml={24}
                  mb="lg"
                  separator="I"
                  separatorMargin="sm"
                  styles={{ separator: { opacity: 0.3 } }}
                >
                </Breadcrumbs>

                {project.tasks.map((task) => (
                  <Task
                    key={task.id}
                    task={task}
                    onCheckChange={handleCheckChange}/>
                ))}
              </>
            ) : (
              <Center mih={400}>
                <EmptyWithIcon
                  title="No se encontraron tareas"
                  subtitle="O no tienes acceso a ninguna de ellas."
                  icon={IconSearch}
                />
              </Center>
            )}
          </Tabs.Panel>
        </form>

      </Tabs>
    </Drawer>
  );
}
