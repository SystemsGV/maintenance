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

const InvoicesIndex = () => {
  const { items } = usePage().props;

  const columns = prepareColumns([
    { label: "Número", column: "number" },
    { label: "Estado", column: "status" },
    { label: "Empresa", column: "name" },
    { label: "Nota", column: "note" },
    { label: "Total", column: "amount" },
    { label: "Total con impuestos", column: "amount_with_tax" },
    { label: "Pago vencido", column: "due_date" },
    { label: "Creado", column: "created_at" },
    {
      label: "Acciones",
      sortable: false,
      visible: actionColumnVisibility("invoice"),
    },
  ]);

  let rows = items.data.length ? (
    items.data.map((item) => <TableRow key={item.id} item={item} />)
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
            <SearchInput placeholder="Buscar facturas" search={search} />
            <ArchivedFilterButton />
          </Group>
        </Grid.Col>
        <Grid.Col span="content">
          {can("crear factura") && (
            <Button
              leftSection={<IconPlus size={14} />}
              radius="xl"
              onClick={() => redirectTo("invoices.create")}
            >
              Crear
            </Button>
          )}
        </Grid.Col>
      </Grid>

      <Table.ScrollContainer miw={800} my="lg">
        <Table verticalSpacing="sm">
          <TableHead columns={columns} sort={sort} />
          <Table.Tbody>{rows}</Table.Tbody>
        </Table>
      </Table.ScrollContainer>

      <Pagination current={items.meta.current_page} pages={items.meta.last_page} />
    </>
  );
};

InvoicesIndex.layout = (page) => <Layout title="Facturas">{page}</Layout>;

export default InvoicesIndex;
