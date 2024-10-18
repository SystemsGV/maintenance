import TableRowActions from "@/components/TableRowActions";
import { ColorSwatch, Table, Text } from "@mantine/core";

export default function TableRow({ item }) {
  return (
    <Table.Tr key={item.id}>
      <Table.Td>
        <Text fz="sm">{item.name}</Text>
      </Table.Td>
      <Table.Td>
        <Text fz="sm">{item.option1}</Text>
      </Table.Td>
      <Table.Td>
        <Text fz="sm">{item.option2}</Text>
      </Table.Td>
      <Table.Td>
        <Text fz="sm">{item.option3}</Text>
      </Table.Td>
      {(can("editar proyecto")) && (
        <Table.Td w={100}>
          <TableRowActions
            item={item}
            editRoute="settings.typesCheck.edit"
            editPermission="editar proyecto"
            archivePermission="archivar proyecto"
            restorePermission="restaurar proyecto"
            archive={{
              route: "settings.typesCheck.destroy",
              title: "Archivar proyecto",
              content: "¿Está seguro de que desea archivar este tipo de check?",
              confirmLabel: "Archivar",
            }}
            restore={{
              route: "settings.typesCheck.restore",
              title: "Restaurar proyecto",
              content: "¿Está seguro de que desea restaurar este tipo de check?",
              confirmLabel: "Restaurar",
            }}
          />
        </Table.Td>
      )}
    </Table.Tr>
  );
}
