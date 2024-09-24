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
        <Group gap='sm'>
          <Link
            href={route('attractions.assets.edit', item.asset.id)}
            key={item.asset.id}
          >
            <Badge
              variant='transparent'
              color='teal'
              tt='unset'
            >
              {item.asset.name}
            </Badge>
          </Link>
        </Group>
      </Table.Td>
      {(can('editar juego') ||
        can('archivar juego') ||
        can('restaurar juego')) && (
        <Table.Td>
          <TableRowActions
            item={item}
            editRoute='attractions.games.edit'
            editPermission='editar juego'
            archivePermission='archivar juego'
            restorePermission='restaurar juego'
            archive={{
              route: 'attractions.games.destroy',
              title: 'Archivar juego',
              content: `¿Está seguro de que desea archivar este juego?`,
              confirmLabel: 'Archivar',
            }}
            restore={{
              route: 'attractions.games.restore',
              title: 'Restaurar juego',
              content: `¿Está seguro de que desea restaurar este juego?`,
              confirmLabel: 'Restaurar',
            }}
          />
        </Table.Td>
      )}
    </Table.Tr>
  );
}
