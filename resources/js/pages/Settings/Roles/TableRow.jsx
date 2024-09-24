import TableRowActions from "@/components/TableRowActions";
import { Table, Text } from "@mantine/core";

export default function TableRow({ item }) {
  const isLocked = (role) => {
    return ["admin", "client"].includes(role);
  };

  return (
    <Table.Tr key={item.id}>
      <Table.Td>
        <Text fz="sm" tt="capitalize" c={isLocked(item.name) ? "blue" : ""}>
          {item.name}
        </Text>
      </Table.Td>
      <Table.Td w={165}>
        <Text fz="sm">{item.permissions_count}</Text>
      </Table.Td>
      {(can("editar rol") || can("archivar rol") || can("restaurar rol")) &&
        item.name !== "admin2" && (
          <Table.Td w={100}>
            <TableRowActions
              item={item}
              editRoute="settings.roles.edit"
              editPermission="editar rol"
              archivePermission="archivar rol"
              restorePermission="restaurar rol"
              archive={{
                route: "settings.roles.destroy",
                title: "Archive role",
                content: "Are you sure you want to archive this role?",
                confirmLabel: "Archive",
              }}
              restore={{
                route: "settings.roles.restore",
                title: "Restore role",
                content: "Are you sure you want to restore this role?",
                confirmLabel: "Restore",
              }}
            />
          </Table.Td>
        )}
    </Table.Tr>
  );
}
