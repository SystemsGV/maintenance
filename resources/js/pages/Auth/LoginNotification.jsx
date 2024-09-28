import { Alert } from "@mantine/core";
import {
  IconInfoCircle,
  IconAlertTriangle,
  IconExclamationCircle,
} from "@tabler/icons-react";

export default function LoginNotification({ notify }) {
  return (
    <div style={{ marginTop: "25px" }}>
      {notify === "password-reset" && (
        <Alert radius="md" title="Password was reset" icon={<IconInfoCircle />}>
          Su contraseña se actualizó exitosamente, puede usarla para iniciar sesión.
        </Alert>
      )}
      {notify === "social-login-user-not-found" && (
        <Alert
          radius="md"
          title="Login failed"
          icon={<IconAlertTriangle />}
          color="orange"
        >
          No se encontró ningún usuario con su dirección de correo electrónico de Google.
        </Alert>
      )}
      {notify === "social-login-failed" && (
        <Alert
          radius="md"
          title="Whoops, something went wrong"
          icon={<IconExclamationCircle />}
          color="red"
        >
          Se ha producido un error inesperado, intenta iniciar sesión con tu correo electrónico y contraseña.
        </Alert>
      )}
    </div>
  );
}
