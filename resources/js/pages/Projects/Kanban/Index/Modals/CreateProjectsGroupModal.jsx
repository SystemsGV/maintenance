import useForm from "@/hooks/useForm";
import { Button, Flex, Text, TextInput } from "@mantine/core";
import { modals } from "@mantine/modals";

function ModalForm() {
  const [form, submit, updateValue] = useForm(
    "post",
    route("projects.kanban.groups.store", [route().params.project]),
    { name: "" },
  );

  const submitModal = (event) => {
    submit(event, {
      onSuccess: () => modals.closeAll(),
      preserveScroll: true,
    });
  };

  return (
    <form onSubmit={submitModal}>
      <TextInput
        label="Nombre"
        placeholder="Nombre del grupo"
        required
        data-autofocus
        value={form.data.name}
        onChange={(e) => updateValue("name", e.target.value)}
        error={form.errors.name}
      />

      <Flex justify="flex-end" mt="xl">
        <Button type="submit" w={100} loading={form.processing}>
          Crear
        </Button>
      </Flex>
    </form>
  );
}

const CreateProjectsGroupModal = () => {
  modals.open({
    title: (
      <Text size="xl" fw={700} mb={-10}>
        Crear grupo de proyectos
      </Text>
    ),
    centered: true,
    padding: "xl",
    overlayProps: { backgroundOpacity: 0.55, blur: 3 },
    children: <ModalForm />,
  });
};

export default CreateProjectsGroupModal;
