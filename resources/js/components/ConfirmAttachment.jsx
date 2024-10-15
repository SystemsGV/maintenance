import { Center, Image, Loader, Text } from "@mantine/core";
import { openConfirmModal as openMantineConfirmModal } from "@mantine/modals";


export const openConfirmModal = ({
  type = "info",
  title,
  content,
  confirmLabel = "Ok",
  cancelLabel = "Cancelar",
  ...props
}) => {

  openMantineConfirmModal({
    title: (
      <Text size="xl" fw={700}>
        {title}
      </Text>
    ),
    centered: true,
    overlayProps: { backgroundOpacity: 0.55, blur: 3 },
    children: !content ? (
      <Center miw={150} maw="80vw" h={150}>
        <Loader color="blue" size="lg" />
      </Center>
    ) : (
      <Image
        src={content.path}
        fit="contain"
        style={{
          maxHeight: "80vh",
        }}
      />
    ),
    labels: { confirm: confirmLabel, cancel: cancelLabel },
    size: '70%',
    ...props,
  });
};
