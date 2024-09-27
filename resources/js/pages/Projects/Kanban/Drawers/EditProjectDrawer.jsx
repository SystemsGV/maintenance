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
import { DateInput } from "@mantine/dates";
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
  const { checkTask, setTasks } = useTasksStore();
  const {users_access, games, labels, types, openedProject } = usePage().props;
  const [tasksCheck, setTasksCheck] = useState({});
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
    default: false,
    users: [],
    labels: [],
    tasks: [],
  });

  const handleCheckChange = async (taskId, value) => {

    const task = data.tasks.find(task => task.id == taskId);
    const newLabels = labels.find(label => label.id == 2);

    initTaskWebSocket(task);
    const options = {
      property: 'check',
      value: value,
    };
    // Prepara un nuevo objeto que incluya todos los valores actualizados
    const updatedTasks = data.tasks.map(task => ({
      ...task, // Copia todos los campos de la tarea
      check: task.id == taskId ? value : task.check,
      labels: task.id == taskId ? [newLabels] : task.labels,
      completed_at: task.id == taskId ? dayjs().toISOString() : task.completed_at,
    }));

    let completed_tasks_count = task.check == null ? project.completed_tasks_count + 1 : project.completed_tasks_count;

    await updateProjectProperty(project, 'tasks', updatedTasks);
    await updateProjectProperty(project, 'completed_tasks_count', completed_tasks_count);
    return await checkTask(project, task, options, setLoading);
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
      <Tabs defaultValue="info">
        <Tabs.List grow>
          <Tabs.Tab value="info">Información</Tabs.Tab>
          <Tabs.Tab value="tasks">Tareas</Tabs.Tab>
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
                      readOnly={!can("editar proyecto")}
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
                      value={data.due_on}
                      onChange={(value) => updateValue("due_on", value)}
                      readOnly={!can("editar proyecto")}
                    />

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
                      step={0.5}
                      suffix=" hours"
                      onChange={(value) => updateValue("estimation", value)}
                      readOnly={!can("editar proyecto")}
                    />

                    {(can("ver registros de tiempo") || can("agregar registro de tiempo")) && <Timer mt="xl" project={project} />}
                  </div>
                </div>
              </>
            ) : (
              <></>
            )}
          </Tabs.Panel>
          <Tabs.Panel value="tasks">
            {edit.opened && project.tasks.length ? (
              <>
                <LoadingOverlay visible={loading} loaderProps={{ children: <Loader size={40} /> }} />

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
