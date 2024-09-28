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
        <Text fz='sm'>{item.email}</Text>
        <Text
          fz='xs'
          c='dimmed'
        >
          Correo electrónico
        </Text>
      </Table.Td>
      <Table.Td>
        <Group gap='sm'>
          {item.clients.map(item => (
            <Link
              href={route('clients.users.edit', item.id)}
              key={item.id}
            >
              <Badge
                variant='light'
                color='orange'
                tt='unset'
              >
                {item.name}
              </Badge>
            </Link>
          ))}
        </Group>
      </Table.Td>
      {(can('editar empresa cliente') ||
        can('archivar empresa cliente') ||
        can('restaurar empresa cliente')) && (
        <Table.Td>
          <TableRowActions
            item={item}
            editRoute='clients.companies.edit'
            editPermission='editar empresa cliente'
            archivePermission='archivar empresa cliente'
            restorePermission='restaurar empresa cliente'
            archive={{
              route: 'clients.companies.destroy',
              title: 'Archivar empresa',
              content: `¿Está seguro de que desea archivar esta empresa?`,
              confirmLabel: 'Archivar',
            }}
            restore={{
              route: 'clients.companies.restore',
              title: 'Restaurar empresa',
              content: `¿Está seguro de que desea restaurar esta empresa?`,
              confirmLabel: 'Restaurar',
            }}
          />
        </Table.Td>
      )}
    </Table.Tr>
  );
}
