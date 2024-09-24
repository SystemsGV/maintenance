import TableRowActions from '@/components/TableRowActions';
import { Link } from '@inertiajs/react';
import { Badge, Group, Table, Text } from '@mantine/core';

export default function TableRow({ item }) {
  return (
    <Table.Tr key={item.id}>
      <Table.Td>
        <Text
          fz='sm'
          fw={500}
        >
          {item.name}
        </Text>
      </Table.Td>
      <Table.Td>
        <Text
          fz='sm'
          fw={500}
        >
          {item.code}
        </Text>
        <Text
          fz='xs'
          c='dimmed'
        >
          Código de la ubicación
        </Text>
      </Table.Td>
      <Table.Td>
        <Text
          fz='sm'
          fw={500}
        >
          {item.address}
        </Text>
      </Table.Td>
      <Table.Td>
        <Badge
          variant='light'
          color='orange'
          tt='unset'
        >
          {item.priority}
        </Badge>
      </Table.Td>
      {(can('editar ubicacion') || can('archivar ubicacion') || can('restaurar ubicacion')) && (
        <Table.Td>
          <TableRowActions
            item={item}
            editRoute='attractions.assets.edit'
            editPermission='editar ubicacion' // roles
            archivePermission='archivar ubicacion' // roles
            restorePermission='restaurar ubicacion' // roles
            archive={{
              route: 'attractions.assets.destroy',
              title: 'Archivar ubicación',
              content: `¿Está seguro de que desea archivar esta ubicación?`,
              confirmLabel: 'Archivar',
            }}
            restore={{
              route: 'attractions.assets.restore',
              title: 'Restaurar ubicación',
              content: `¿Está seguro de que desea restaurar esta ubicación?`,
              confirmLabel: 'Restaurar',
            }}
          />
        </Table.Td>
      )}
    </Table.Tr>
  );
}
