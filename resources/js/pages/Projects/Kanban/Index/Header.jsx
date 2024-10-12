import ArchivedFilterButton from "@/components/ArchivedFilterButton";
import ClearFiltersButton from "@/components/ClearFiltersButton";
import SearchInput from "@/components/SearchInput";
import usePeojectDrawerStore from "@/hooks/store/useProjectDrawerStore";
import useProjectFiltersStore from "@/hooks/store/useProjectFiltersStore";
import useProjectPreferences from "@/hooks/useProjectPreferences";
import { reloadWithQuery } from "@/utils/route";
import { usePage } from "@inertiajs/react";
import { ActionIcon, Button, Grid, Group, Text, Title, Tooltip } from "@mantine/core";
import {
  IconFilter,
  IconFilterCog,
  IconLayoutKanban,
  IconLayoutList,
  IconPlus,
} from "@tabler/icons-react";

export default function Header() {
  const { project } = usePage().props;

  const { projectsView, setProjectsView } = useProjectPreferences();
  const { openDrawer } = useProjectFiltersStore();
  const search = (search) => reloadWithQuery({ search });

  const { openCreateProject } = usePeojectDrawerStore();
  const { hasUrlParams } = useProjectFiltersStore();
  const usingFilters = hasUrlParams(["archived"]);

  return (
    <Grid justify="space-between" align="end">
      <Grid.Col span="content">
        <Group mb="lg">
          <Title order={1}>
            Ordenes de trabajo
          </Title>
        </Group>
        <Group>
          <SearchInput placeholder="Buscar proyectos" search={search} mr="md" />

          <ActionIcon.Group>
            {projectsView === "kanban" && (
              <Tooltip label="Filters" openDelay={500} withArrow>
                <ActionIcon variant="filled" size="lg" onClick={() => openDrawer()}>
                  {usingFilters ? (
                    <IconFilterCog style={{ width: "60%", height: "60%" }} stroke={1.5} />
                  ) : (
                    <IconFilter style={{ width: "60%", height: "60%" }} stroke={1.5} />
                  )}
                </ActionIcon>
              </Tooltip>
            )}
            {usingFilters && <ClearFiltersButton />}
          </ActionIcon.Group>

          <ArchivedFilterButton />
        </Group>
      </Grid.Col>
      <Grid.Col span="content">
        <Group>
          <Group mr="sm" gap={10}>
            <ActionIcon.Group>
              <ActionIcon
                size="lg"
                variant={projectsView === "list" ? "filled" : "default"}
                onClick={() => setProjectsView("list")}
              >
                <Tooltip label="List view" openDelay={250} withArrow>
                  <IconLayoutList style={{ width: "40%", height: "40%" }} />
                </Tooltip>
              </ActionIcon>
              <ActionIcon
                size="lg"
                variant={projectsView === "kanban" ? "filled" : "default"}
                onClick={() => setProjectsView("kanban")}
              >
                <Tooltip label="Kanban view" openDelay={250} withArrow>
                  <IconLayoutKanban style={{ width: "45%", height: "45%" }} />
                </Tooltip>
              </ActionIcon>
            </ActionIcon.Group>
          </Group>

          {can("crear proyecto") && (
            <Button
              leftSection={<IconPlus size={14} />}
              radius="xl"
              onClick={() => openCreateProject()}
            >
              Agregar
            </Button>
          )}
        </Group>
      </Grid.Col>
    </Grid>
  );
}
