import ArchivedFilterButton from "@/components/ArchivedFilterButton";
import Pagination from "@/components/Pagination";
import SearchInput from "@/components/SearchInput";
import TableHead from "@/components/TableHead";
import TableRowEmpty from "@/components/TableRowEmpty";
import Layout from "@/layouts/MainLayout";
import { redirectTo, reloadWithQuery } from "@/utils/route";
import { actionColumnVisibility, prepareColumns } from "@/utils/table";
import { usePage } from "@inertiajs/react";
import { Button, Grid, Group, Table } from "@mantine/core";
import { IconPlus } from "@tabler/icons-react";
import TableRow from "./TableRow";

const TypeCheckIndex = () => {
  const { items } = usePage().props;

  const columns = prepareColumns([
    { label: "Nombre", column: "name" },
    { label: "Opción 1", column: "option1", sortable: false },
    { label: "Opción 2", column: "option2", sortable: false  },
    { label: "Opción 3", column: "option3", sortable: false  },
    {
      label: "Acciones",
      sortable: false,
    },
  ]);

  const rows = items.data.length ? (
    items.data.map((item) => <TableRow item={item} key={item.id} />)
  ) : (
    <TableRowEmpty colSpan={columns.length} />
  );

  const search = (search) => reloadWithQuery({ search });
  const sort = (sort) => reloadWithQuery(sort);

  return (
    <>
      <Grid justify="space-between" align="center">
        <Grid.Col span="content">
          <Group>
            <SearchInput placeholder="Buscar tipos de check" search={search} />
            <ArchivedFilterButton />
          </Group>
        </Grid.Col>
        <Grid.Col span="content">
          {can("crear proyecto") && (
            <Button
              leftSection={<IconPlus size={14} />}
              radius="xl"
              onClick={() => redirectTo("settings.typesCheck.create")}
            >
              Crear
            </Button>
          )}
        </Grid.Col>
      </Grid>

      <Table.ScrollContainer maw={900} my="lg">
        <Table verticalSpacing="sm">
          <TableHead columns={columns} sort={sort} />
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

TypeCheckIndex.layout = (page) => <Layout title="Tipos de check">{page}</Layout>;

export default TypeCheckIndex;
