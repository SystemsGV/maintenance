import ActionButton from '@/components/ActionButton';
import BackButton from '@/components/BackButton';
import useForm from '@/hooks/useForm';
import ContainerBox from '@/layouts/ContainerBox';
import Layout from '@/layouts/MainLayout';
import { redirectTo } from '@/utils/route';
import { usePage } from '@inertiajs/react';
import {
  Anchor,
  Breadcrumbs,
  Checkbox,
  Fieldset,
  Grid,
  Group,
  Select,
  TextInput,
  Title,
} from '@mantine/core';

const CheckListEdit = () => {
  const { item, dropdowns: { games, periods }} = usePage().props;
  const [form, submit, updateValue] = useForm('post', route('attractions.checklists.update', item.id), {
    _method: 'put',
    name: item.name,
    archive: item.archive,
    period_id: item.period_id.id.toString(),
    game_id: item.game_id.id.toString(),
  });

  return (
    <>
      <Breadcrumbs
        fz={14}
        mb={30}
      >
        <Anchor
          href='#'
          onClick={() => redirectTo('attractions.checklists.index')}
          fz={14}
        >
          Check Lists
        </Anchor>
        <div>Editar</div>
      </Breadcrumbs>

      <Grid
        justify='space-between'
        align='flex-end'
        gutter='xl'
        mb='lg'
      >
        <Grid.Col span='auto'>
          <Title order={1}>Editar checklist</Title>
        </Grid.Col>
        <Grid.Col span='content'></Grid.Col>
      </Grid>

      <ContainerBox maw={600}>
      <form onSubmit={submit}>

        <TextInput
            label='Nombre'
            placeholder='Nombre del checklist'
            required
            value={form.data.name}
            onChange={e => updateValue('name', e.target.value)}
            error={form.errors.name}
          />

          <Select
            label='Periodo'
            placeholder='Seleccione el periodo del checklist'
            required
            mt='md'
            searchable={true}
            value={form.data.period_id}
            onChange={value => updateValue('period_id', value)}
            data={periods}
            error={form.errors.period_id}
          />

          <Select
            label='Atracción'
            placeholder='Seleccione la atracción del checklist'
            mt='md'
            required
            searchable={true}
            value={form.data.game_id}
            onChange={value => updateValue('game_id', value)}
            data={games}
            error={form.errors.game_id}
          />

          <Checkbox
            label="Subir imagen"
            description="Seleccionar para que sea obligatorio"
            mt="xl"
            checked={form.data.archive}
            onChange={(event) => updateValue("archive", event.currentTarget.checked)}
          />

          <Group
            justify='space-between'
            mt='xl'
          >
            <BackButton route='attractions.checklists.index' />
            <ActionButton loading={form.processing}>Actualizar</ActionButton>
          </Group>
        </form>
      </ContainerBox>
    </>
  );
};

CheckListEdit.layout = page => <Layout title='Editar checklist'>{page}</Layout>;

export default CheckListEdit;
