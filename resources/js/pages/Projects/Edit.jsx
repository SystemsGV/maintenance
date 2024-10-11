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
  MultiSelect,
  NumberInput,
  Select,
  TextInput,
  Textarea,
  Title,
} from '@mantine/core';
import { useEffect, useState } from 'react';

const ProjectEdit = ({ dropdowns: { companies, users, currencies, games, types } }) => {
  const { item } = usePage().props;
  const [currencySymbol, setCurrencySymbol] = useState();

  const [form, submit, updateValue] = useForm('post', route('projects.update', item.id), {
    _method: 'put',
    name: item.name,
    description: item.description || '',
    client_company_id: item.client_company_id || '',
    game_id: item.game_id || '',
    type_id: item.type_id || '',
    rate: item.rate / 100 || 0,
    users: item.users.map(i => i.id.toString()),
  });

  useEffect(() => {
    let symbol = currencies.find(i =>
      i.client_companies.find(c => c.id.toString() == form.data.client_company_id)
    )?.symbol;

    if (symbol) {
      setCurrencySymbol(symbol);
    }
  }, [form.data.client_company_id]);

  return (
    <>
      <Breadcrumbs
        fz={14}
        mb={30}
      >
        <Anchor
          href='#'
          onClick={() => redirectTo('projects.index')}
          fz={14}
        >
          Ordenes de trabajo
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
          <Title order={1}>Editar orden de trabajo</Title>
        </Grid.Col>
        <Grid.Col span='content'></Grid.Col>
      </Grid>

      <ContainerBox maw={500}>
        <form onSubmit={submit}>
          <TextInput
            label='Nombre'
            placeholder='Nombre de la orden de trabajo'
            required
            mt='md'
            value={form.data.name}
            onChange={e => updateValue('name', e.target.value)}
            error={form.errors.name}
          />

          <Textarea
            label='Descripción'
            placeholder='Descripción de la orden de trabajo'
            mt='md'
            autosize
            minRows={4}
            maxRows={8}
            value={form.data.description}
            onChange={e => updateValue('description', e.target.value)}
          />

          <Select
            label='Company requesting work'
            placeholder='Select company'
            required
            display="none"
            mt='md'
            value={form.data.client_company_id?.toString()}
            onChange={value => updateValue('client_company_id', value)}
            data={companies}
            error={form.errors.client_company_id}
          />

          <Select
            label="Atracción que requiere mantenimiento"
            placeholder="Seleccionar atracción"
            readOnly
            mt="md"
            value={form.data.game_id?.toString()}
            onChange={(value) => updateValue("game_id", value)}
            data={games}
            error={form.errors.game_id}
          />

          <Select
            label="Tipo de mantenimiento"
            placeholder="Seleccionar tipo de mantenimiento"
            searchable
            mt="md"
            value={form.data.type_id?.toString()}
            onChange={(value) => updateValue("type_id", value)}
            data={types}
            error={form.errors.type_id}
          />

          <MultiSelect
            label="Conceder acceso a los usuarios"
            placeholder="Seleccionar usuarios"
            mt='md'
            searchable
            value={form.data.users}
            onChange={(values) => updateValue("users", values)}
            data={users}
            error={form.errors.users}
          />

          <NumberInput
            label='Tarifa por hora'
            mt='md'
            allowNegative={false}
            clampBehavior='strict'
            decimalScale={2}
            fixedDecimalScale={true}
            prefix={currencySymbol}
            value={form.data.rate}
            display="none"
            onChange={value => updateValue('rate', value)}
            error={form.errors.rate}
          />

          <Group
            justify='space-between'
            mt='xl'
          >
            <BackButton route='projects.index' />
            <ActionButton loading={form.processing}>Actualizar</ActionButton>
          </Group>
        </form>
      </ContainerBox>
    </>
  );
};

ProjectEdit.layout = page => <Layout title='Editar orden de trabajo'>{page}</Layout>;

export default ProjectEdit;
