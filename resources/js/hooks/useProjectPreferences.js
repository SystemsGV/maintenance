import { useLocalStorage } from "@mantine/hooks";

export default function useProjectPreferences() {
  const [projectsView, setProjectsView] = useLocalStorage({
    key: "projects-view",
    defaultValue: "list",
    getInitialValueInEffect: false,
  });

  return {projectsView, setProjectsView};
}
