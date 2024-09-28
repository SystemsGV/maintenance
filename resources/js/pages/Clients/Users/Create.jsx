import ActionButton from "@/components/ActionButton";
import BackButton from "@/components/BackButton";
import useForm from "@/hooks/useForm";
import ContainerBox from "@/layouts/ContainerBox";
import Layout from "@/layouts/MainLayout";
import { redirectTo } from "@/utils/route";
import { getInitials } from "@/utils/user";
import { usePage } from "@inertiajs/react";
import {
  Anchor,
  Avatar,
  Breadcrumbs,
  Divider,
  FileInput,
  Grid,
  Group,
  MultiSelect,
  PasswordInput,
  Text,
  TextInput,
  Title,
} from "@mantine/core";

const ClientCreate = () => {
  const {
    dropdowns: { companies },
  } = usePage().props;

  const [form, submit, updateValue] = useForm("post", route("clients.users.store"), {
    avatar: null,
    name: "",
    phone: "",
    email: "",
    password: "",
    password_confirmation: "",
    companies: [],
  });

  return (
    <>
      <Breadcrumbs fz={14} mb={30}>
        <Anchor href="#" onClick={() => redirectTo("clients.users.index")} fz={14}>
          Clientes
        </Anchor>
        <div>Crear</div>
      </Breadcrumbs>

      <Grid justify="space-between" align="flex-end" gutter="xl" mb="lg">
        <Grid.Col span="auto">
          <Title order={1}>Crear cliente</Title>
        </Grid.Col>
        <Grid.Col span="content"></Grid.Col>
      </Grid>

      <ContainerBox maw={600}>
        <form onSubmit={(e) => submit(e, { forceFormData: true })}>
          <Grid justify="flex-start" align="flex-start" gutter="lg">
            <Grid.Col span="content">
              <Avatar
                src={form.data.avatar !== null ? URL.createObjectURL(form.data.avatar) : null}
                size={120}
                color="blue"
              >
                {getInitials(form.data.name)}
              </Avatar>
            </Grid.Col>
            <Grid.Col span="auto">
              <FileInput
                label="Foto de perfil"
                placeholder="Cargar imagen"
                accept="image/png,image/jpeg"
                onChange={(image) => updateValue("avatar", image)}
                clearable
                error={form.errors.avatar}
              />
              <Text size="xs" c="dimmed" mt="sm">
                Si no se carga ninguna imagen, intentaremos recuperarla a través del servicio{" "}
                <Anchor href="https://unavatar.io" target="_blank" opacity={0.6}>
                  unavatar.io
                </Anchor>
              </Text>
            </Grid.Col>
          </Grid>

          <TextInput
            label="Nombre"
            placeholder="Nombre completo del usuario"
            required
            mt="md"
            value={form.data.name}
            onChange={(e) => updateValue("name", e.target.value)}
            error={form.errors.name}
          />

          <TextInput
            label="Teléfono"
            placeholder="Número de teléfono del usuario"
            mt="md"
            value={form.data.phone}
            onChange={(e) => updateValue("phone", e.target.value)}
            error={form.errors.phone}
          />

          <MultiSelect
            label="Empresas"
            placeholder="Empresas cliente"
            mt="md"
            value={form.data.companies}
            onChange={(values) => updateValue("companies", values)}
            data={companies}
            error={form.errors.companies}
          />

          {form.data.companies.length === 0 && (
            <Text c="dimmed" fz="xs" mt="xs">
              Si se deja vacío, se le pedirá que cree una empresa después de crear el cliente.
            </Text>
          )}

          <Divider mt="xl" mb="md" label="Credenciales de inicio de sesión" labelPosition="center" />

          <TextInput
            label="Correo eletrónico"
            placeholder="Correo eletrónico del usuario"
            required
            value={form.data.email}
            onChange={(e) => updateValue("email", e.target.value)}
            onBlur={() => form.validate("email")}
            error={form.errors.email}
          />

          <PasswordInput
            label="Contraseña"
            placeholder="Contraseña del usuario"
            required
            mt="md"
            value={form.data.password}
            onChange={(e) => updateValue("password", e.target.value)}
            error={form.errors.password}
          />

          <PasswordInput
            label="Confirmar contraseña"
            placeholder="Confirmar contraseña"
            required
            mt="md"
            value={form.data.password_confirmation}
            onChange={(e) => updateValue("password_confirmation", e.target.value)}
            error={form.errors.password_confirmation}
          />

          <Group justify="space-between" mt="xl">
            <BackButton route="clients.users.index" />
            <ActionButton loading={form.processing}>Crear</ActionButton>
          </Group>
        </form>
      </ContainerBox>
    </>
  );
};

ClientCreate.layout = (page) => <Layout title="Crear cliente">{page}</Layout>;

export default ClientCreate;
