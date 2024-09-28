import ContainerBox from "@/layouts/ContainerBox";
import GuestLayout from "@/layouts/GuestLayout";
import { redirectTo } from "@/utils/route";
import {
  Alert,
  Anchor,
  Box,
  Button,
  Center,
  Group,
  Text,
  TextInput,
  Title,
  rem,
} from "@mantine/core";
import { IconArrowLeft, IconInfoCircle } from "@tabler/icons-react";
import { useForm } from "laravel-precognition-react-inertia";
import classes from "./css/ForgotPassword.module.css";

const ForgotPassword = ({ status }) => {
  const form = useForm("post", route("auth.forgotPassword.sendLink"), {
    email: "",
  });

  const submit = (e) => {
    e.preventDefault();
    form.clearErrors();

    form.submit({ preserveScroll: true });
  };

  return (
    <>
      <Title className={classes.title} ta="center">
        ¿Olvidaste tu contraseña?
      </Title>
      <Text c="dimmed" fz="sm" ta="center">
        Ingrese su correo electrónico para obtener un enlace de reinicio
      </Text>

      <ContainerBox shadow="md" p={30} mt="xl" radius="md">
        <Text c="dimmed" fz="sm" mb={20}>
          Ingrese su correo electrónico y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir uno nuevo.
        </Text>

        {status && (
          <Alert radius="md" title={status} icon={<IconInfoCircle />} mb={10}>
            Lea las instrucciones en el correo electrónico para establecer una nueva contraseña para su cuenta.
          </Alert>
        )}

        <form onSubmit={submit}>
          <TextInput
            label="Correo electrónico"
            placeholder="Tu correo electrónico"
            required
            onChange={(e) => form.setData("email", e.target.value)}
            onBlur={() => form.validate("email")}
            error={form.errors.email}
          />
          <Group justify="space-between" mt="lg" className={classes.controls}>
            <Anchor
              c="dimmed"
              size="sm"
              className={classes.control}
              onClick={() => redirectTo("auth.login.form")}
            >
              <Center inline>
                <IconArrowLeft style={{ width: rem(12), height: rem(12) }} stroke={1.5} />
                <Box ml={5}>Volver al inicio de sesión</Box>
              </Center>
            </Anchor>
            <Button type="submit" className={classes.control} disabled={form.processing}>
              Restablecer contraseña
            </Button>
          </Group>
        </form>
      </ContainerBox>
    </>
  );
};

ForgotPassword.layout = (page) => <GuestLayout title="Forgot Password">{page}</GuestLayout>;

export default ForgotPassword;
