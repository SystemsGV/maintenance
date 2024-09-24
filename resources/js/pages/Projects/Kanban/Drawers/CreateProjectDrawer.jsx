import { openConfirmModal } from "@/components/ConfirmModal";
import useProjectDrawerStore from "@/hooks/store/useProjectDrawerStore";
import useForm from "@/hooks/useForm";
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
  Textarea,
  rem,
} from "@mantine/core";
import { DateInput } from "@mantine/dates";
import { useEffect } from "react";
import LabelsDropdown from "./LabelsDropdown";
import classes from "./css/ProjectDrawer.module.css";

export function CreateProjectDrawer() {
  const { create, closeCreateProject } = useProjectDrawerStore();
  const {
    // usersWithAccessToProject,
    users,
    games,
    labels,
    types,
    auth: { user },
  } = usePage().props;

  const initial = {
    client_company_id: 1,
    group_id: create.group_id ? create.group_id.toString() : 1,
    game_id: "",
    period_id: "",
    type_id: "",
    name: "",
    description: "",
    rate: 0,
    estimation: "",
    due_on: "",
    default: false,
    labels: [],
    users: [],
  };

  const [form, submit, updateValue] = useForm(
    "post",
    route("projects.kanban.store", [route().params.project]),
    {
      ...initial,
    },
  );

  useEffect(() => {
    updateValue({ ...initial });
  }, [create.opened]);

  const closeDrawer = (force = false) => {
    if (force || (JSON.stringify(form.data) === JSON.stringify(initial) && !form.processing)) {
      closeCreateProject();
    } else {
      openConfirmModal({
        type: "danger",
        title: "¿Descartar cambios?",
        content: `Todos los cambios no guardados se perderán.`,
        confirmLabel: "Desechar",
        confirmProps: { color: "red" },
        onConfirm: () => closeCreateProject(),
      });
    }
  };

  return (
    <Drawer
      opened={create.opened}
      onClose={closeDrawer}
      title={
        <Text fz={rem(28)} fw={600} ml={25} my="sm">
          Agregar nueva OT
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
      <form onSubmit={(event) => submit(event, {
            onSuccess: () => closeDrawer(true),
            forceFormData: true,
          })
        }
        className={classes.inner}
      >
        <div className={classes.content}>
          <TextInput
            label="Nombre"
            placeholder="Nombre de la orden de trabajo"
            required
            data-autofocus
            value={form.data.name}
            onChange={(e) => updateValue("name", e.target.value)}
            error={form.errors.name}
          />

          <Textarea
            label='Descripción'
            placeholder='Descripción de la orden de trabajo'
            mt='md'
            autosize
            minRows={15}
            maxRows={20}
            value={form.data.description}
            onChange={e => updateValue('description', e.target.value)}
          />

          <MultiSelect
            label="Conceder acceso a las usuarias"
            placeholder="Seleccionar usuarios"
            searchable
            mt="md"
            value={form.data.users}
            onChange={(values) => updateValue("users", values)}
            data={users}
            error={form.errors.users}
          />

          <Flex justify="space-between" mt="xl">
            <Button variant="transparent" w={100} disabled={form.processing} onClick={closeDrawer}>
              Cancelar
            </Button>

            <Button type="submit" w={120} loading={form.processing}>
              Agregar OT
            </Button>
          </Flex>
        </div>
        <div className={classes.sidebar}>
          <Select
            label="Atracción que requiere mantenimiento"
            placeholder="Seleccionar atracción"
            searchable
            value={form.data.game_id}
            onChange={(value) => updateValue("game_id", value)}
            data={games}
            error={form.errors.game_id}
          />

          <Select
            label="Tipo de mantenimiento"
            placeholder="Seleccionar tipo de mantenimiento"
            searchable
            mt="md"
            value={form.data.type_id}
            onChange={(value) => updateValue("type_id", value)}
            data={types}
            error={form.errors.type_id}
          />

          <DateInput
            clearable
            valueFormat="DD MMM YYYY"
            minDate={new Date()}
            mt="md"
            label="Fecha de vencimiento"
            placeholder="Elija la fecha de vencimiento de la OT"
            value={form.data.due_on}
            onChange={(value) => updateValue("due_on", value)}
          />

          <LabelsDropdown
            items={labels}
            selected={form.data.labels}
            onChange={(values) => updateValue("labels", values)}
            mt="md"
          />

          <NumberInput
            label="Estimación de tiempo"
            mt="md"
            decimalScale={2}
            fixedDecimalScale
            defaultValue={0}
            min={0}
            allowNegative={false}
            step={0.5}
            suffix=" hours"
            onChange={(value) => updateValue("estimation", value)}
          />

        </div>
      </form>
    </Drawer>
  );
}
