import { openConfirmModal } from "@/components/ConfirmModal";
import Dropzone from "@/components/Dropzone";
import RichTextEditor from "@/components/RichTextEditor";
import useTaskDrawerStore from "@/hooks/store/useTaskDrawerStore";
import useForm from "@/hooks/useForm";
import { hasRoles } from "@/utils/user";
import { usePage } from "@inertiajs/react";
import {
  Button,
  Checkbox,
  Drawer,
  Flex,
  MultiSelect,
  NumberInput,
  Select,
  Text,
  TextInput,
  rem,
} from "@mantine/core";
import { DateInput } from "@mantine/dates";
import { useEffect } from "react";
import LabelsDropdown from "./LabelsDropdown";
import classes from "./css/TaskDrawer.module.css";

export function CreateTaskDrawer() {
  const { create, closeCreateTask } = useTaskDrawerStore();
  const {
    usersWithAccessToProject,
    taskGroups,
    labels,
    typeChecks,
    auth: { user },
  } = usePage().props;

  const initial = {
    group_id: create.group_id ? create.group_id.toString() : "",
    assigned_to_user_id: "",
    name: "",
    description: "",
    estimation: "",
    due_on: "",
    type_check: "",
    hidden_from_clients: false,
    sent_archive: false,
    billable: true,
    subscribed_users: usersWithAccessToProject.map(i => String(i.id)),
    labels: [1],
    attachments: [],
  };

  const [form, submit, updateValue] = useForm(
    "post",
    route("projects.tasks.store", [route().params.project]),
    {
      ...initial,
    },
  );

  useEffect(() => {
    updateValue({ ...initial });
  }, [create.opened]);

  const closeDrawer = (force = false) => {
    if (force || (JSON.stringify(form.data) === JSON.stringify(initial) && !form.processing)) {
      closeCreateTask();
    } else {
      openConfirmModal({
        type: "danger",
        title: "Discard changes?",
        content: `Todos los cambios no guardados se perderán.`,
        confirmLabel: "Desechar",
        confirmProps: { color: "red" },
        onConfirm: () => closeCreateTask(),
      });
    }
  };

  const removeAttachment = (index) => {
    const files = [...form.data.attachments];
    files.splice(index, 1);
    updateValue("attachments", files);
  };

  return (
    <Drawer
      opened={create.opened}
      onClose={closeDrawer}
      title={
        <Text fz={rem(28)} fw={600} ml={25} my="sm">
          Agregar nueva tarea
        </Text>
      }
      position="right"
      size={1000}
      overlayProps={{ backgroundOpacity: 0.55, blur: 3 }}
      transitionProps={{
        transition: "slide-left",
        duration: 400,
        timingFunction: "ease",
      }}
    >
      <form
        onSubmit={(event) =>
          submit(event, {
            onSuccess: () => closeDrawer(true),
            forceFormData: true,
          })
        }
        className={classes.inner}
      >
        <div className={classes.content}>
          <TextInput
            label="Nombre"
            placeholder="Nombre de la tarea"
            required
            data-autofocus
            value={form.data.name}
            onChange={(e) => updateValue("name", e.target.value)}
            error={form.errors.name}
          />

          <RichTextEditor
            mt="xl"
            placeholder="Descripción de la tarea"
            height={260}
            onChange={(content) => updateValue("description", content)}
          />

          <Dropzone
            mt="xl"
            selected={form.data.attachments}
            onChange={(files) => updateValue("attachments", files)}
            remove={(index) => removeAttachment(index)}
          />

          <MultiSelect
            label="Suscriptores"
            placeholder="Seleccionar suscriptores"
            searchable
            mt="md"
            value={form.data.subscribed_users}
            onChange={(values) => updateValue("subscribed_users", values)}
            data={usersWithAccessToProject.map((i) => ({
              value: i.id.toString(),
              label: i.name,
            }))}
            error={form.errors.subscribed_users}
          />

          <Flex justify="space-between" mt="xl">
            <Button variant="transparent" w={100} disabled={form.processing} onClick={closeDrawer}>
              Cancelar
            </Button>

            <Button type="submit" w={120} loading={form.processing}>
              Agregar tareas
            </Button>
          </Flex>
        </div>
        <div className={classes.sidebar}>
          <Select
            label="Grupo de tareas"
            placeholder="Seleccionar grupo de tareas"
            required
            value={form.data.group_id}
            onChange={(value) => updateValue("group_id", value)}
            data={taskGroups.map((i) => ({
              value: i.id.toString(),
              label: i.name,
            }))}
            error={form.errors.group_id}
          />

          <DateInput
            clearable
            valueFormat="DD MMM YYYY"
            minDate={new Date()}
            mt="md"
            label="Fecha de vencimiento"
            placeholder="Elija la fecha de vencimiento de la tarea"
            value={form.data.due_on}
            onChange={(value) => updateValue("due_on", value)}
          />

          <Select
            label='Tipo de check'
            placeholder='Seleccione el tipo del checklist'
            mt='md'
            required
            value={form.data.type_check}
            onChange={value => updateValue('type_check', value)}
            data={typeChecks}
            error={form.errors.type_check}
          />

          <LabelsDropdown
            items={labels}
            selected={form.data.labels}
            onChange={(values) => updateValue("labels", values)}
            mt="md"
          />

          <NumberInput
            label="Tiempode estimación"
            mt="md"
            decimalScale={2}
            fixedDecimalScale
            defaultValue={0}
            min={0}
            allowNegative={false}
            step={0.5}
            suffix=" horas"
            onChange={(value) => updateValue("estimation", value)}
          />

          <Checkbox
            label="Subir imagen"
            description="Habilitar para que sea obligatorio"
            mt="xl"
            checked={form.data.sent_archive}
            onChange={(event) => updateValue("sent_archive", event.currentTarget.checked)}
          />

          <Checkbox
            label="billable"
            mt="xl"
            display="none"
            checked={form.data.billable}
            onChange={(event) => updateValue("billable", event.currentTarget.checked)}
          />

          {!hasRoles(user, ["client"]) && (
            <Checkbox
              label="Oculto de los clientes"
              display="none"
              mt="md"
              checked={form.data.hidden_from_clients}
              onChange={(event) => updateValue("hidden_from_clients", event.currentTarget.checked)}
            />
          )}
        </div>
      </form>
    </Drawer>
  );
}
