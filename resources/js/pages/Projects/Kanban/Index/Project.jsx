import useProjectPreferences from "@/hooks/useProjectPreferences";
import ProjectCard from "./Task/ProjectCard";
import ProjectRow from "./Task/ProjectRow";

export default function Project({ project, index, checkbox }) {
  const { projectsView } = useProjectPreferences();

  return projectsView === "list" ? (
    <ProjectRow project={project} index={index} />
  ) : (
    <ProjectCard project={project} index={index} />
  );
}
