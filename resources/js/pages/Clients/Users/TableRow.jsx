import TableRowActions from "@/components/TableRowActions";
import { getInitials } from "@/utils/user";
import { Link } from "@inertiajs/react";
import { Avatar, Badge, Group, Table, Text } from "@mantine/core";

export default function TableRow({ item }) {
  return (
    <Table.Tr key={item.id}>
      <Table.Td>
        <Group gap="sm">
          <Avatar src={item.avatar} size={40} radius={40} color="blue" alt={item.name}>
            {getInitials(item.name)}
          </Avatar>
          <div>
            <Text fz="sm" fw={500}>
              {item.name}
            </Text>
            <Text fz="xs" c="dimmed">
              {item.job_title}
            </Text>
          </div>
        </Group>
      </Table.Td>
      <Table.Td>
        <Text fz="sm">{item.email}</Text>
        <Text fz="xs" c="dimmed">
          Correo electrónico
        </Text>
      </Table.Td>
      <Table.Td>
        <Group gap="sm">
          {item.companies.map((item) => (
            <Link href={route("clients.companies.edit", item.id)} key={item.id}>
              <Badge variant="light" color="grape" tt="unset">
                {item.name}
              </Badge>
            </Link>
          ))}
        </Group>
      </Table.Td>
      {(can("editar usuario cliente") || can("ar usuario cliente") || can("restaurar usuario cliente")) && (
        <Table.Td>
          <TableRowActions
            item={item}
            editRoute="clients.users.edit"
            editPermission="editar usuario cliente"
            archivePermission="archivar usuario cliente"
            restorePermission="restaurar usuario cliente"
            archive={{
              route: "clients.users.destroy",
              title: "Archivar cliente",
              content: `¿Está seguro de que desea archivar este cliente? Esta acción evitará
              el cliente inicie sesión, mientras que todos los demás aspectos relacionados con el
              las acciones del cliente no se verán afectadas.`,
              confirmLabel: "Archivar",
            }}
            restore={{
              route: "clients.users.restore",
              title: "Restaurar cliente",
              content: `¿Está seguro de que desea restaurar este cliente? Esta acción permitirá que el cliente inicie sesión.`,
              confirmLabel: "Restaurar",
            }}
          />
        </Table.Td>
      )}
    </Table.Tr>
  );
}
