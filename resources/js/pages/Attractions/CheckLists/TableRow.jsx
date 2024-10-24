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
          {item.game_id.name}
        </Text>
        <Text
          fz='xs'
          c='dimmed'
        >
          Nombre de la atracción
        </Text>
      </Table.Td>
      <Table.Td>
        <Badge
          variant='light'
          color='cyan'
          tt='unset'
        >
          {item.period_id.name}
        </Badge>
      </Table.Td>
      <Table.Td>
        <Badge
          variant='light'
          color={item.archive == 1 ? 'green' : 'red'}
          tt='unset'
        >
          {item.archive == 1 ? 'SI' : 'NO'}
        </Badge>
      </Table.Td>
      {(can('editar checklist') || can('archivar checklist') || can('restaurar checklist')) && (
        <Table.Td>
          <TableRowActions
            item={item}
            editRoute='attractions.checklists.edit'
            editPermission='editar checklist' // roles
            archivePermission='archivar checklist' // roles
            restorePermission='restaurar checklist' // roles
            archive={{
              route: 'attractions.checklists.destroy',
              title: 'Archivar ubicación',
              content: `¿Está seguro de que desea archivar este checklist?`,
              confirmLabel: 'Archivar',
            }}
            restore={{
              route: 'attractions.checklists.restore',
              title: 'Restaurar ubicación',
              content: `¿Está seguro de que desea restaurar este checklist?`,
              confirmLabel: 'Restaurar',
            }}
          />
        </Table.Td>
      )}
    </Table.Tr>
  );
}
