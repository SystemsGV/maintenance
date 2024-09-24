import useProjectFiltersStore from "@/hooks/store/useProjectFiltersStore";
import { Drawer, Text, rem } from "@mantine/core";
import Filters from "./Filters";

export default function FiltersDrawer() {
  const { openedDrawer, closeDrawer } = useProjectFiltersStore();

  return (
    <Drawer
      opened={openedDrawer}
      onClose={() => closeDrawer()}
      title={
        <Text fz={rem(28)} fw={600} mt="sm">
          Filters
        </Text>
      }
      position="right"
      size={300}
      overlayProps={{ backgroundOpacity: 0.4 }}
      transitionProps={{
        transition: "slide-left",
        duration: 400,
        timingFunction: "ease",
      }}
    >
      <Filters />
    </Drawer>
  );
}
