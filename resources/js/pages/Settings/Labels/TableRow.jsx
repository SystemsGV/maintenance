import TableRowActions from "@/components/TableRowActions";
import { ColorSwatch, Table, Text } from "@mantine/core";

export default function TableRow({ item }) {
  return (
    <Table.Tr key={item.id}>
      <Table.Td w={80}>
        <ColorSwatch color={item.color} />
      </Table.Td>
      <Table.Td>
        <Text fz="sm">{item.name}</Text>
      </Table.Td>
      {(can("editar etiqueta") || can("archivar etiqueta") || can("restaurar etiqueta")) && (
        <Table.Td w={100}>
          <TableRowActions
            item={item}
            editRoute="settings.labels.edit"
            editPermission="editar etiqueta"
            archivePermission="archivar etiqueta"
            restorePermission="restaurar etiqueta"
            archive={{
              route: "settings.labels.destroy",
              title: "Archivar etiqueta",
              content: "¿Está seguro de que desea archivar esta etiqueta?",
              confirmLabel: "Archivar",
            }}
            restore={{
              route: "settings.labels.restore",
              title: "Restaurar etiqueta",
              content: "¿Está seguro de que desea restaurar esta etiqueta?",
              confirmLabel: "Restaurar",
            }}
          />
        </Table.Td>
      )}
    </Table.Tr>
  );
}
