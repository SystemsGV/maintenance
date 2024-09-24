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
  Grid,
  Group,
  Select,
  TextInput,
  Title,
} from '@mantine/core';

const AttractionsGamesCreate = () => {
  const {
    dropdowns: { assets },
  } = usePage().props;
  const [form, submit, updateValue] = useForm('post', route('attractions.games.store'), {
    name: '',
    asset_id: '',
  });

  return (
    <>
      <Breadcrumbs
        fz={14}
        mb={30}
      >
        <Anchor
          href='#'
          onClick={() => redirectTo('attractions.games.index')}
          fz={14}
        >
          Juegos
        </Anchor>
        <div>Crear</div>
      </Breadcrumbs>

      <Grid
        justify='space-between'
        align='flex-end'
        gutter='xl'
        mb='lg'
      >
        <Grid.Col span='auto'>
          <Title order={1}>Crear juego</Title>
        </Grid.Col>
        <Grid.Col span='content'></Grid.Col>
      </Grid>

      <ContainerBox maw={600}>
        <form onSubmit={submit}>
          <TextInput
            label='Nombre'
            placeholder='Nombre del juego'
            required
            value={form.data.name}
            onChange={e => updateValue('name', e.target.value)}
            error={form.errors.name}
          />

          <Select
            label='Ubicación'
            placeholder='Seleccionar su ubicación'
            required
            mt='md'
            searchable={true}
            value={form.data.asset_id}
            onChange={value => updateValue('asset_id', value)}
            data={assets}
            error={form.errors.asset_id}
          />

          <Group
            justify='space-between'
            mt='xl'
          >
            <BackButton route='attractions.games.index' />
            <ActionButton loading={form.processing}>Crear</ActionButton>
          </Group>
        </form>
      </ContainerBox>
    </>
  );
};

AttractionsGamesCreate.layout = page => <Layout title='Crear juego'>{page}</Layout>;

export default AttractionsGamesCreate;
