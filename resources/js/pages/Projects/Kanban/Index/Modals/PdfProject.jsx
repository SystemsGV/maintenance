import useForm from "@/hooks/useForm";
import { hasRoles } from "@/utils/user";
import { Button, Flex, MultiSelect, Skeleton, Text } from "@mantine/core";
import { modals } from "@mantine/modals";
import axios from "axios";
import { useEffect, useRef, useState } from "react";

function ModalForm({ project }) {
  const [requestPending, setRequestPending] = useState(true);
  const [pdfUrl, setPdfUrl] = useState(null); // Estado para almacenar la URL del PDF

  useEffect(() => {
    const fetchPdf = async () => {
      try {
        const response = await axios.get(route("projects.kanban.pdf", project), { responseType: 'blob' });
        const url = URL.createObjectURL(response.data);
        setPdfUrl(url); // Establece la URL del PDF en el estado
      } catch (error) {
        console.error("Error al generar el PDF:", error);
        alert("No se pudo generar el PDF");
      } finally {
        setRequestPending(false); // Marca como no pendiente
      }
    };

    fetchPdf();
    return () => {
      if (pdfUrl) {
        URL.revokeObjectURL(pdfUrl); // Libera la URL cuando el componente se desmonta
      }
    };
  }, [project]);

  return (
    <div>
      {requestPending ? (
        <>
          <Skeleton height={10} width={50} mt={10} radius="xl" />
          <Skeleton height={25} mt={10} radius="xl" />
          <Skeleton height={25} mt={30} radius="xl" />

          <Skeleton height={10} width={50} mt={50} radius="xl" />
          <Skeleton height={25} mt={10} radius="xl" />
          <Skeleton height={25} mt={30} radius="xl" />

          <Skeleton height={10} width={50} mt={50} radius="xl" />
          <Skeleton height={25} mt={10} radius="xl" />
          <Skeleton height={25} mt={30} radius="xl" />

          <Skeleton height={10} width={50} mt={50} radius="xl" />
          <Skeleton height={25} mt={10} radius="xl" />
          <Skeleton height={25} mt={30} radius="xl" />
          <Skeleton height={25} mt={30} radius="xl" />
          <Skeleton height={25} mt={30} radius="xl" />
          <Skeleton height={25} mt={30} radius="xl" />
        </>
      ) : (
        <div style={{ height: '780px', overflow: 'auto' }}>
          {pdfUrl ? (
            <iframe
              src={pdfUrl}
              width="100%"
              height="100%"
              style={{ border: 'none' }}
              title="PDF Preview"
            />
          ) : (
            <p>No se pudo cargar el PDF.</p>
          )}
        </div>
      )}
    </div>
  );
}

const PdfProject = (project) => {
  modals.open({
    title: (
      <Text size="xl" fw={700} mb={-10}>
        {project.name}
      </Text>
    ),
    centered: true,
    padding: "sm",
    fullScreen: true,
    overlayProps: { backgroundOpacity: 0.55, blur: 3 },
    children: <ModalForm project={project} />,
  });};

export default PdfProject;
