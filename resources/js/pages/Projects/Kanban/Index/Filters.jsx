import useProjectGroupsStore from "@/hooks/store/useProjectGroupsStore";
import useProjectFiltersStore from "@/hooks/store/useProjectFiltersStore";
import { usePage } from "@inertiajs/react";
import { ColorSwatch, Stack, Text } from "@mantine/core";
import FilterButton from "./Filters/FilterButton";
import { DateInput } from "@mantine/dates";
import dayjs from "dayjs";

export default function Filters() {
  const { usersWithAccessToProject, labels } = usePage().props;

  const { groups } = useProjectGroupsStore();
  const { filters, toggleArrayFilter, toggleObjectFilter, toggleValueFilter } =
    useProjectFiltersStore();

  return (
    <>
      <Stack justify="flex-start" gap={24}>
        {groups.length > 0 && (
          <div>
            <Text fz="xs" fw={700} tt="uppercase" mb="sm">
              Grupo de ordenes de trabajo
            </Text>
            <Stack justify="flex-start" gap={6}>
              {groups.map((item) => (
                <FilterButton
                  key={item.id}
                  selected={filters.groups.includes(item.id)}
                  onClick={() => toggleArrayFilter("groups", item.id)}
                >
                  {item.name}
                </FilterButton>
              ))}
            </Stack>
          </div>
        )}

        {/* {usersWithAccessToProject.length > 0 && (
          <div>
            <Text fz="xs" fw={700} tt="uppercase" mb="sm">
              Assignees
            </Text>
            <Stack justify="flex-start" gap={6}>
              {usersWithAccessToProject.map((item) => (
                <FilterButton
                  key={item.id}
                  selected={filters.assignees.includes(item.id)}
                  onClick={() => toggleArrayFilter("assignees", item.id)}
                >
                  {item.name}
                </FilterButton>
              ))}
            </Stack>
          </div>
        )} */}

        <div>
          <Text fz="xs" fw={700} tt="uppercase" mb="sm">
            Fecha
          </Text>
          <Stack justify="flex-start" gap={6}>
            <DateInput
              clearable
              valueFormat="DD MMM YYYY"
              placeholder="Elija la fecha de la OT"
              value={filters.date ? dayjs(filters.date).toDate() : null}
              onChange={value => {
              toggleValueFilter("date", dayjs(value).format('YYYY-MM-DD'));
              }}
            />
          </Stack>
        </div>

        <div>
          <Text fz="xs" fw={700} tt="uppercase" mb="sm">
            Fecha de vencimiento
          </Text>
          <Stack justify="flex-start" gap={6}>
            <FilterButton
              selected={filters.due_date.not_set == 1}
              onClick={() => toggleObjectFilter("due_date", "not_set")}
            >
              No establecido
            </FilterButton>
            <FilterButton
              selected={filters.due_date.overdue == 1}
              onClick={() => toggleObjectFilter("due_date", "overdue")}
            >
              Vencido
            </FilterButton>
          </Stack>
        </div>

        <div>
          <Text fz="xs" fw={700} tt="uppercase" mb="sm">
            Estado
          </Text>
          <Stack justify="flex-start" gap={6}>
            <FilterButton
              selected={filters.status === "completed"}
              onClick={() => toggleValueFilter("status", "completed")}
            >
              Completado
            </FilterButton>
          </Stack>
        </div>

        {labels.length > 0 && (
          <div>
            <Text fz="xs" fw={700} tt="uppercase" mb="sm">
              Etiquetas
            </Text>
            <Stack justify="flex-start" gap={6}>
              {labels.map((item) => (
                <FilterButton
                  key={item.id}
                  selected={filters.labels.includes(item.id)}
                  onClick={() => toggleArrayFilter("labels", item.id)}
                  leftSection={<ColorSwatch color={item.color} size={18} />}
                >
                  {item.name}
                </FilterButton>
              ))}
            </Stack>
          </div>
        )}
      </Stack>
    </>
  );
}
