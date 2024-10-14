import ArchivedFilterButton from '@/components/ArchivedFilterButton';
import Pagination from '@/components/Pagination';
import SearchInput from '@/components/SearchInput';
import TableHead from '@/components/TableHead';
import TableRowEmpty from '@/components/TableRowEmpty';
import Layout from '@/layouts/MainLayout';
import { redirectTo, reloadWithQuery } from '@/utils/route';
import { actionColumnVisibility, prepareColumns } from '@/utils/table';
import { usePage } from '@inertiajs/react';
import { Button, Grid, Group, Table } from '@mantine/core';
import { IconPlus } from '@tabler/icons-react';
import TableRow from './TableRow';

const GamesIndex = () => {
  const { items } = usePage().props;

  const columns = prepareColumns([
    { label: 'Atracción', column: 'name' },
    { label: 'Ubicación', sortable: false },
    {
      label: 'Acciones',
      sortable: false,
      visible: actionColumnVisibility('game'), // roles
    },
  ]);

  const rows = items.data.length ? (
    items.data.map(item => (
      <TableRow
        item={item}
        key={item.id}
      />
    ))
  ) : (
    <TableRowEmpty colSpan={columns.length} />
  );

  const search = search => reloadWithQuery({ search });
  const sort = sort => reloadWithQuery(sort);

  return (
    <>
      <Grid justify='space-between' align='center'>
        <Grid.Col span='content'>

          <Group>
            <SearchInput
              placeholder='Buscar juegos'
              search={search}
            />
            <ArchivedFilterButton />
          </Group>

        </Grid.Col>

        <Grid.Col span='content'>
          {can('crear juego') && ( // roles
            <Button
              leftSection={<IconPlus size={14} />}
              radius='xl'
              onClick={() => redirectTo('attractions.games.create')}
            >
              Crear
            </Button>
          )}
        </Grid.Col>
      </Grid>

      <Table.ScrollContainer
        miw={800}
        my='lg'
      >
        <Table verticalSpacing='sm'>
          <TableHead
            columns={columns}
            sort={sort}
          />
          <Table.Tbody>{rows}</Table.Tbody>
        </Table>
      </Table.ScrollContainer>

      <Pagination
        current={items.meta.current_page}
        pages={items.meta.last_page}
      />
    </>
  );
};

GamesIndex.layout = page => <Layout title='Atracciones'>{page}</Layout>;

export default GamesIndex;
