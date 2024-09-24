import { EmptyResult } from "@/components/EmptyResult";
import { Text } from "@mantine/core";
import ArchivedProject from "./ArchivedProject";
import ArchivedProjectGroup from "./ArchivedProjectGroup";

export default function ArchivedItems({ groups, projects }) {
  const hasProjects = Object.keys(projects).some((key) => projects[key].length > 0);

  return groups.length || hasProjects ? (
    <>
      {hasProjects && (
        <>
          <Text fz={24} fw={600} mb={20}>
            Ordenes de trabajo
          </Text>
          {Object.keys(projects).map((key) =>
            projects[key].map((project) => <ArchivedProject key={`project-${project.id}`} project={project} />),
          )}
        </>
      )}
      {groups.length > 0 && (
        <>
          <Text fz={24} fw={600} mt={35} mb={20}>
            Grupos de OT
          </Text>
          {groups.map((group) => (
            <ArchivedProjectGroup key={`group-${group.id}`} group={group} />
          ))}
        </>
      )}
    </>
  ) : (
    <EmptyResult title="No projects or groups found" subtitle="or none match your search criteria" />
  );
}
