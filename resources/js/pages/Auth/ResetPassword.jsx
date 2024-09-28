import ContainerBox from "@/layouts/ContainerBox";
import GuestLayout from "@/layouts/GuestLayout";
import { Button, PasswordInput, Text, TextInput, Title } from "@mantine/core";
import { useForm } from "laravel-precognition-react-inertia";
import { useEffect } from "react";
import classes from "./css/ResetPassword.module.css";

const ResetPassword = ({ token }) => {
  const form = useForm("post", route("auth.newPassword.save"), {
    token,
    email: "",
    password: "",
    password_confirmation: "",
  });

  useEffect(() => {
    return () => {
      form.reset("password", "password_confirmation");
    };
  }, []);

  const submit = (e) => {
    e.preventDefault();
    form.clearErrors();
    form.submit({ preserveScroll: true });
  };

  return (
    <>
      <Title className={classes.title} ta="center">
        Restablecer contraseña
      </Title>
      <Text c="dimmed" fz="sm" ta="center">
        Introduce tu correo electrónico y nueva contraseña
      </Text>

      <ContainerBox shadow="md" p={30} mt="xl" radius="md">
        <form onSubmit={submit}>
          <TextInput
            label="Correo electrónioco"
            placeholder="Tu Correo electrónioco"
            required
            onChange={(e) => form.setData("email", e.target.value)}
            error={form.errors.email}
          />
          <PasswordInput
            label="Contraseña"
            placeholder="Nueva contraseña"
            required
            mt="md"
            value={form.data.password}
            onChange={(e) => form.setData("password", e.target.value)}
            error={form.errors.password}
          />
          <PasswordInput
            label="Confirmar Contraseña"
            placeholder="Repetir nueva contraseña"
            required
            mt="md"
            value={form.data.password_confirmation}
            onChange={(e) => form.setData("password_confirmation", e.target.value)}
            error={form.errors.password_confirmation}
          />
          <Button type="submit" fullWidth mt="xl" disabled={form.processing}>
            Restablecer contraseña
          </Button>
        </form>
      </ContainerBox>
    </>
  );
};

ResetPassword.layout = (page) => <GuestLayout title="Reset Password">{page}</GuestLayout>;

export default ResetPassword;
