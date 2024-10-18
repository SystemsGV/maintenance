import ActionButton from "@/components/ActionButton";
import BackButton from "@/components/BackButton";
import useForm from "@/hooks/useForm";
import ContainerBox from "@/layouts/ContainerBox";
import Layout from "@/layouts/MainLayout";
import { redirectTo } from "@/utils/route";
import { usePage } from "@inertiajs/react";
import { Anchor, Breadcrumbs, ColorInput, Grid, Group, TextInput, Title } from "@mantine/core";

const TypeCheckEdit = () => {
  const { item } = usePage().props;

  const [form, submit, updateValue] = useForm("post", route("settings.typesCheck.update", item.id), {
    _method: "put",
    name: item.name,
    option1: item.option1 || '',
    option2: item.option2 || '',
    option3: item.option3 || '',
  });

  return (
    <>
      <Breadcrumbs fz={14} mb={30}>
        <Anchor href="#" onClick={() => redirectTo("settings.typesCheck.index")} fz={14}>
          Tipo de check
        </Anchor>
        <div>Editar</div>
      </Breadcrumbs>

      <Grid justify="space-between" align="flex-end" gutter="xl" mb="lg">
        <Grid.Col span="auto">
          <Title order={1}>Editar tipo de check</Title>
        </Grid.Col>
        <Grid.Col span="content"></Grid.Col>
      </Grid>

      <ContainerBox maw={400}>
        <form onSubmit={submit}>
          <TextInput
            label="Nombre"
            placeholder="Nombre del tipo del check"
            required
            value={form.data.name}
            onChange={(e) => updateValue("name", e.target.value)}
            error={form.errors.name}
          />

          <TextInput
            label="Opcion 1"
            placeholder="nombre de la opcion 1"
            mt="md"
            value={form.data.option1}
            onChange={(e) => updateValue("option1", e.target.value)}
            error={form.errors.option1}
          />

          <TextInput
            label="Opcion 2"
            placeholder="nombre de la opcion 2"
            mt="md"
            value={form.data.option2}
            onChange={(e) => updateValue("option2", e.target.value)}
            error={form.errors.option2}
          />

          <TextInput
            label="Opcion 3"
            placeholder="nombre de la opcion 3"
            mt="md"
            value={form.data.option3}
            onChange={(e) => updateValue("option3", e.target.value)}
            error={form.errors.option3}
          />


          <Group justify="space-between" mt="xl">
            <BackButton route="settings.typesCheck.index" />
            <ActionButton loading={form.processing}>Actualizar</ActionButton>
          </Group>
        </form>
      </ContainerBox>
    </>
  );
};

TypeCheckEdit.layout = (page) => <Layout title="Editar tipo de check">{page}</Layout>;

export default TypeCheckEdit;
